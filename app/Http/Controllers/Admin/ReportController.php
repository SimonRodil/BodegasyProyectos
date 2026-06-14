<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityReport;

class ReportController extends Controller
{
    public function index()
    {
        $reports = ActivityReport::latest()->get();
        return view('admin.reports', compact('reports'));
    }
}
