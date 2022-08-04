<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Productlist extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products;

    public function __construct($products)
    {
       $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $products = $this->products;
        return view('components.productlist',compact('products'));
    }
}
