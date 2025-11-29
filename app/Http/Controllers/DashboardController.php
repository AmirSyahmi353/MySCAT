<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();
        $normalCount = Patient::where('score', '<', 46)->count();
        $highCount = Patient::where('score', '>=', 46)->count();
        $recentCount = Patient::where('updated_at', '>=', Carbon::now()->subWeek())->count();
        $recentPatients = Patient::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalPatients',
            'normalCount',
            'highCount',
            'recentCount',
            'recentPatients'
        ));
    }
}
