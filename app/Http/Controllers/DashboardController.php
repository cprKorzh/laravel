<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Section;

class DashboardController extends Controller
{
    public function index()
    {

        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.reports');
        }

        $sections = Section::all();
        $existingReport = Auth::user() ? Auth::user()->report : null;

        return view('dashboard', compact('sections', 'existingReport'));
    }
}
