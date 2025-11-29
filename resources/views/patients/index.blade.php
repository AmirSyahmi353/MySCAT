@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 fw-semibold">Patients</h1>
    </div>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('patients.index') }}" class="row g-3 mb-4 align-items-center">
        <!-- Search -->
        <div class="col-auto">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name, email, or ID..."
                class="form-control"
            >
        </div>

        <!-- Status Filter -->
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">Status</option>
                <option value="Normal" {{ request('status') == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="High" {{ request('status') == 'High' ? 'selected' : '' }}>High</option>
                <option value="Low" {{ request('status') == 'Low' ? 'selected' : '' }}>Low</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('patients.index') }}" class="btn btn-link">Reset</a>
        </div>
    </form>

    {{-- Patients Table --}}
    <div class="card shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table custom-table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Email address</th>
                        <th>Score</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($patients as $p)
                    <tr class="clickable-row"
                        data-href="{{ route('patients.show', $p->_id) }}">

                        <td class="text-dark">
                            {{ ucfirst($p->name) }}
                        </td>

                        <td>{{ $p->_id }}</td>

                        <td class="text-muted">{{ $p->email }}</td>

                        <td class="fw-normal">{{ $p->score ?? '-' }}</td>

                        <td class="fw-normal">
                            @if ($p->score === null)
                                <span class="text-secondary">No Assessment</span>
                            @elseif ($p->score < 17)
                                <span class="text-success">Normal</span>
                            @elseif ($p->score >= 17)
                                <span class="text-danger">High</span>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>

{{-- TABLE & ROW CSS --}}
<style>
/* Alternate row colors */
.custom-table tbody tr:nth-child(odd) {
    background-color: #f8f9fb; /* light grey */
}
.custom-table tbody tr:nth-child(even) {
    background-color: #ffffff;
}

/* Hover effect */
.custom-table tbody tr:hover {
    background-color: #e9eef7 !important;
    transition: 0.2s ease;
}

/* Clickable row */
.clickable-row {
    cursor: pointer;
}

/* Make table cleaner */
.custom-table th {
    background: #f1f3f7;
    text-transform: uppercase;
    font-size: 0.75rem;
    font-weight: 600;
    color: #6c757d;
}

.custom-table td {
    padding: 14px 16px;
    vertical-align: middle;
    font-size: 0.95rem;
}

/* Remove bold from score + status */
.custom-table td.fw-normal {
    font-weight: 400 !important;
}
</style>

{{-- CLICKABLE ROW SCRIPT --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".clickable-row").forEach(row => {
        row.addEventListener("click", () => {
            window.location.href = row.dataset.href;
        });
    });
});
</script>

@endsection
