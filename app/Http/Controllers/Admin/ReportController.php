<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            [(__('Dashboard')), route('admin.home')],
            [(__('Reports')), route('admin.report.allJob')],
            [(__('All Jobs Report')), null]
        ];
        return view('admin.reports.all-jobs', compact('breadcrumbs'));
    }
}
