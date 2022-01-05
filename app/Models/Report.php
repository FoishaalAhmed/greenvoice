<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_category_id', 'title', 'file',
    ];

    public function getReports()
    {
        $reports = $this::join('report_categories', 'reports.report_category_id', '=', 'report_categories.id')
            ->latest()
            ->select('reports.*', 'report_categories.name')
            ->get();
        return $reports;
    }

    public function storeReport(Object $request)
    {
        $image = $request->file('file');
        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path     = 'public/images/reports/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->file     = $image_url;
        $this->report_category_id = $request->report_category_id;
        $this->title = $request->title;
        $storeReport = $this->save();

        $storeReport
            ? session()->flash('success', 'New Report Published Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function updateReport(Object $request, Object $report)
    {
        $image = $request->file('file');

        if ($image) {
            if (file_exists($report->file)) unlink($report->file);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'public/images/reports/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $report->file     = $image_url;
        }

        $report->report_category_id = $request->report_category_id;
        $report->title = $request->title;
        $updateReport = $report->save();

        $updateReport
            ? session()->flash('success', 'Update Report Published Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyReport(Object $report)
    {
        if (file_exists($report->file)) unlink($report->file);

        $destroyReport = $report->delete();

        $destroyReport
            ? session()->flash('success', 'Report Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
    }
}
