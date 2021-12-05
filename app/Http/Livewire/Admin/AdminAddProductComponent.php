<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class AdminAddProductComponent extends Component
{
 use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $fetured;
    public $quantity;
    public $image;
    public $category_id;



    public function mount()
    {
        $this->stock_status='instock';
        $this->fetured = 0 ;
    }
    public function generateslug()
    {
        $this->slug=Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            
                'name'=>'required',
                'slug'=>'required |unique:products',
                'short_description'=>'required',
                'description'=>'required',
                'regular_price'=>'required|numeric',
                'sale_price'=>'numeric',
                'SKU'=>'required',
                'stock_status'=>'required', 
                'quantity'=>'required|numeric',
                'image'=>'required|mimes:jpeg,png',
                'category_id' => 'required'
     
        ]);
    }




    public function storeProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required |unique:products',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sale_price'=>'numeric',
            'SKU'=>'required',
            'stock_status'=>'required', 
            'quantity'=>'required|numeric',
            'image'=>'required|mimes:jpeg,png',
            'category_id' => 'required'


        ]);
        $product= new Product();
        $product->name= $this->name;
        $product->slug= $this->slug;
        $product->short_description= $this->short_description;
        $product->description= $this->description;
        $product->regular_price= $this->regular_price;
        $product->sale_price= $this->sale_price;
        $product->SKU= $this->SKU;
        $product->stock_status= $this->stock_status;
        $product->fetured= $this->fetured;
        $product->quantity= $this->quantity;
        $imagename= Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imagename);
        $product->image= $imagename;
        $product->category_id= $this->category_id;



        $product->save();
        Session()->flash('message','product has been added succesfully');

    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
