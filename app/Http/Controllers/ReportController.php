<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function create()
    {
        $sections = Section::all();
        $existingReport = Auth::user()->report; // Получаем заявку текущего пользователя

        return view('dashboard', compact('sections', 'existingReport'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('photo') ? $request->file('photo')->store('reports', 'public') : null;

        Auth::user()->report()->create([
            'fullname' => $request->fullname,
            'path_img' => $path,
            'theme' => $request->theme,
            'section_id' => $request->section_id,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Заявка отправлена. Ожидайте одобрения.');
    }
}
