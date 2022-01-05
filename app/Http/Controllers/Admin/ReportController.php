<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Models\ReportCategory;

class ReportController extends Controller
{
    protected $reportObject;

    public function __construct()
    {
        $this->reportObject = new Report();
    }

    public function index()
    {
        $reports = $this->reportObject->getReports();
        return view('backend.admin.reports.index', compact('reports'));
    }

    public function create()
    {
        $categories = ReportCategory::orderBy('name', 'asc')->select('id', 'name')->get();
        return view('backend.admin.reports.create', compact('categories')); 
    }

    public function store(ReportRequest $request)
    {
        $this->reportObject->storeReport($request);
        return back();
    }

    public function edit(Report $report)
    {
        $categories = ReportCategory::orderBy('name', 'asc')->select('id', 'name')->get();
        return view('backend.admin.reports.edit', compact('categories', 'report')); 
    }

    public function update(ReportRequest $request, Report $report)
    {
        $this->reportObject->updateReport($request, $report);
        return redirect()->route('admin.reports.index');
    }

    public function destroy(Report $report)
    {
        $this->reportObject->destroyReport($report);
        return back();
    }
}
