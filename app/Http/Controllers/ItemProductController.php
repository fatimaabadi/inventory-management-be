<?php

namespace App\Http\Controllers;

use App\Models\ItemProduct;
use Illuminate\Http\Request;

class ItemProductController extends Controller
{
    // Get all items of a product type
    public function index($productTypeId)
    {
        $items = ItemProduct::where('product_type_id', $productTypeId)
            ->with('productType') // Include Product Type details
            ->get();
    
        return response()->json($items);
    }
    // Add new item
    public function store(Request $request)
    {
        $request->validate([
            'product_type_id' => 'required|exists:product_types,id',
            'serial_number' => 'required|unique:item_product,serial_number',
        ]);

        $item = ItemProduct::create([
            'product_type_id' => $request->product_type_id,
            'serial_number' => $request->serial_number,
        ]);

        return response()->json($item, 201);
    }

    public function updateSoldStatus(Request $request, $id)
    {
        $item = ItemProduct::find($id);
    
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
    
        $validatedData = $request->validate([
            'sold' => 'required|boolean',
        ]);
    
        $item->sold = $validatedData['sold'];
        $item->save();
    
        return response()->json(['message' => 'Sold status updated successfully', 'item' => $item], 200);
    }
    // Delete an item
    public function destroy($id)
    {
        $item = ItemProduct::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Item deleted']);
    }
}
