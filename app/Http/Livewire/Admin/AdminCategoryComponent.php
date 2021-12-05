<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use Livewire\withPagination;
use Livewire\Component;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id){
        $category= Category::find($id);
        $category->delete();
        Session()->flash('message','Category has been deleted succesfully');
    }
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories' =>$categories])->layout('layouts.base');
    }
}
