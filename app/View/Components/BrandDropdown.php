<?php

namespace App\View\Components;

use App\Models\Brand;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BrandDropdown extends Component
{
    public $brands;
    public $product;
    public $name;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($product = null, $name = 'brand_id', $id = 'brand_id')
    {
        //
        $this->brands = Brand::all();
        $this->product = $product;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.brand-dropdown');
    }
}
