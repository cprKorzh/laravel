<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $sections = Section::all(); // Загружаем список секций
        $existingReport = Auth::user()->report; // Проверяем, подал ли пользователь заявку

        return view('dashboard', compact('sections', 'existingReport'));
    }
}
