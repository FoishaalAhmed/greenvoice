<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportCategory;
use Illuminate\Http\Request;

class ReportCategoryController extends Controller
{
    private $categoryObject;

    public function __construct()
    {
        $this->categoryObject = new ReportCategory();
    }

    public function index()
    {
        $categories = ReportCategory::orderBy('name', 'asc')->get();
        return view('backend.admin.reportCategory', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(ReportCategory::$validateRule);
        $this->categoryObject->storeCategory($request);
        return back();
    }

    public function update(Request $request, $id)
    {

        $request->validate(ReportCategory::$validateRule);
        $this->categoryObject->updateCategory($request, $request->id);
        return redirect()->route('admin.report-categories.index');
    }

    public function destroy($id)
    {
        $this->categoryObject->destroyCategory($id);
        return back();
    }
}
