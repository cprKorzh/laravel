<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::with('user', 'section')->get();
        return view('admin.reports', compact('reports'));
    }

    public function approve(Report $report)
    {
        $report->update(['status' => 'approved']);
        return back()->with('success', 'Заявка одобрена.');
    }

    public function reject(Report $report)
    {
        $report->update(['status' => 'rejected']);
        return back()->with('error', 'Заявка отклонена.');
    }
}
