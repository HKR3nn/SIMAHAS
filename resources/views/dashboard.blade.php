@extends('layouts.app')
<link rel="stylesheet" href="public/layout.css">

@section('content')
<h4 class="mb-4 fw-semibold">Dashboard Kehadiran</h4>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat">
            <h2>{{ array_sum($data->toArray()) }}</h2>
            <p>Total Data</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat">
            <h2>{{ $data['Hadir'] ?? 0 }}</h2>
            <p>Hadir</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat">
            <h2>{{ $data['Izin'] ?? 0 }}</h2>
            <p>Izin</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat">
            <h2>{{ $data['Alpha'] ?? 0 }}</h2>
            <p>Alpha</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card p-4">
            <h6 class="mb-3">Distribusi Kehadiran</h6>
            <canvas id="donut"></canvas>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4">
            <h6 class="mb-3">Grafik Kehadiran</h6>
            <canvas id="bar"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const data = @json($data);

new Chart(donut, {
    type: 'doughnut',
    data: {
        labels: Object.keys(data),
        datasets: [{
            data: Object.values(data),
           backgroundColor: ['#1e3a8a', '#2563eb', '#60a5fa', '#bfdbfe']

        }]
    }
});

new Chart(bar, {
    type: 'bar',
    data: {
        labels: Object.keys(data),
        datasets: [{
            data: Object.values(data),
            backgroundColor: ['#1e3a8a', '#2563eb', '#60a5fa', '#bfdbfe']
        }] 
    }
});
</script>
@endsection
