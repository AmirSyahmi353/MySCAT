<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Show all patients (with filters)
    public function index(Request $request)
    {
        $query = Patient::query();

        // 🔍 Search bar (by name, email, or id)
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('_id', 'like', "%{$search}%");
            });
        }

        // 🩺 Filter by Status (Normal / High)
        if ($request->filled('status')) {
            if ($request->status === 'Normal') {
                $query->where('score', '<', 46);
            } elseif ($request->status === 'High') {
                $query->where('score', '>=', 46);
            }
        }

        // Optional: filter by exact score (if needed)
        if ($request->filled('score')) {
            $query->where('score', (int) $request->score);
        }

        $patients = $query->get();

        return view('patients.index', compact('patients'));
    }

    // Show selected patient
    public function show($id)
    {
        $patient = Patient::find($id); // MongoDB supports _id
        if (!$patient) {
            abort(404, 'Patient not found');
        }

        return view('patients.show', compact('patient'));
    }

    public function profile($id)
    {
        $demographics = \App\Models\Patient::find($id);

        if (!$demographics) {
            abort(404, 'Patient not found');
        }

        return view('patients.profile', compact('demographics'));
    }

}

