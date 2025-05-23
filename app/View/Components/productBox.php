<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;
class productBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $product;

    public function __construct(Product $product)
    {
        //

        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-box');
    }
}
