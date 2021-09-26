<?php

namespace App\Http\Controllers;

use Illluminate\Http\Request;

use App\Models\Meal;

class MealExportController extends Controller
{
    public function index()
    {
        $meals = Meal::all();
        return view('export/meals', compact('meals'));
    }
    
    public function exportToPDF()
    {
        $meals = Meal::all();
        return view('export/meals', compact('meals'));
    }
}
