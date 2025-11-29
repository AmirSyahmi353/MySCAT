@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden max-w-3xl mx-auto border border-gray-100">
        <div class="bg-blue-800 text-white px-6 py-4">
            <h2 class="text-2xl font-semibold">Patient Profile</h2>
        </div>

        <div class="p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <p class="font-semibold text-gray-600">Full Name:</p>
                <p>{{ $demographics->full_name }}</p>

                <p class="font-semibold text-gray-600">Age:</p>
                <p>{{ $demographics->age }}</p>

                <p class="font-semibold text-gray-600">Gender:</p>
                <p>{{ $demographics->gender }}</p>

                <p class="font-semibold text-gray-600">Race:</p>
                <p>{{ $demographics->race }}</p>

                <p class="font-semibold text-gray-600">Postcode:</p>
                <p>{{ $demographics->postcode }}</p>

                <p class="font-semibold text-gray-600">Work:</p>
                <p>{{ $demographics->work }}</p>

                <p class="font-semibold text-gray-600">Education Level:</p>
                <p>{{ $demographics->education_level }}</p>

                <p class="font-semibold text-gray-600">Email:</p>
                <p>{{ $demographics->email }}</p>

                <p class="font-semibold text-gray-600">Height (cm):</p>
                <p>{{ $demographics->height_cm }}</p>

                <p class="font-semibold text-gray-600">Weight (kg):</p>
                <p>{{ $demographics->weight_kg }}</p>
            </div>
        </div>

        <div class="bg-gray-50 px-6 py-4 text-right">
            <a href="{{ route('patients.index') }}"
               class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
               ← Back to Patient List
            </a>
        </div>
    </div>
</div>
@endsection
