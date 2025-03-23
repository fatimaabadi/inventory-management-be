<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    // List all product types, optionally with search functionality
    public function index(Request $request)
    {
        $user = auth()->user();
        \Log::info('Authenticated user in index:', ['user' => $user]);
        
        $search = $request->query('search');
        
        // Use the relationship so that only this user's product types are fetched:
        $query = $user->productTypes();
        
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        
        $productTypes = $query->get();
        
        // Add full image URLs
        $productTypes->transform(function ($productType) {
            $productType->image = $productType->image 
                ? asset('storage/' . $productType->image) 
                : null;
            return $productType;
        });
        
        return response()->json($productTypes, 200);
    }
    

    public function store(Request $request)
    {
       // \Log::info('Store method called');

       \Log::info('User:', ['user' => auth()->user()]);
        // Validate incoming request
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
            'count' => 'nullable|integer', // If count isn't required, this is fine
        ]);
        // Assuming the user is authenticated
        $user = auth()->user();


        \Log::info('Validated data:', $validated);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product-types', 'public');  // Save image to the 'product-types' directory in the 'public' disk
            $validated['image'] = $imagePath;
        }
    
        // Create product type
        $productType = ProductType::create([
            'name' => $validated['name'],
            'image' => $validated['image'] ?? null, // Image might be null if no file is uploaded
            'count' => $validated['count'] ?? 0,     // Default count to 0 if not provided
            'user_id' => $user->id, //  Assign the authenticated user's ID

        ]);
    
        \Log::info('ProductType created:', $productType->toArray());
    
        return response()->json($productType, 201);
    }
    
    

    // Show a single product type (if needed)
    public function show($id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->image_url = $productType->image 
            ? asset('storage/' . $productType->image) 
            : null;
        
        return response()->json($productType, 200);
    }

    // Update an existing product type
    public function update(Request $request, $id)
    {
        $productType = ProductType::find($id);
    
        if (!$productType) {
            return response()->json(['message' => 'Product type not found'], 404);
        }
    
        // ✅ Validate input
        $validatedData = $request->validate([
            'name'  => 'sometimes|string|max:255',
            'count' => 'sometimes|integer|min:0',
            'image' => 'sometimes|image|max:2048', // Ensure uploaded file is an image and not too large
        ]);
    
        // ✅ Handle image upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('product-types', 'public');
        }
    
        // ✅ Update only provided fields
        $productType->update($validatedData);
    
        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $productType // No need to fetch again, `$productType` is updated in memory
        ]);
    }
    
    
    
    // Delete a product type
    public function destroy($id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}

