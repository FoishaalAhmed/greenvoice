<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static $validateRule = [
        'name' => 'required|string|max: 255| unique:report_categories,name',
    ];

    public function storeCategory(Object $request)
    {
        $this->name      = $request->name;
        $storeCategory   = $this->save();

        $storeCategory ?
            session()->flash('success', 'Category Created Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function updateCategory(Object $request, Int $id)
    {
        $category = $this::findOrFail($id);
        $category->name      = $request->name;
        $updateCategory      = $category->save();

        $updateCategory ?
            session()->flash('success', 'Category Updated Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyCategory(Int $id)
    {
        $category = $this::findOrFail($id);
        $deleteCategory = $category->delete();

        $deleteCategory ?
            session()->flash('success', 'Category Deleted Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
