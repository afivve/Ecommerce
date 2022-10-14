<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity;

    public function addToWhishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'ALready added to wishlist');
                return false;
            } else {
            }
            Wishlist::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId
            ]);
            session()->flash('message', 'Wishlist Added Successfully');
        } else {
            session()->flash('message', 'Please Login to continue');
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outofstock';
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->category = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
