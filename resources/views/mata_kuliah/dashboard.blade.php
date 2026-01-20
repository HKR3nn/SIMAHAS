@extends('layouts.app')

@section('content')
<h4>Dashboard Kehadiran SIMAHAS</h4>
<canvas id="chart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('chart'), {
 type: 'pie',
 data: {
  labels: {!! json_encode($data->pluck('status')) !!},
  datasets: [{
   data: {!! json_encode($data->pluck('total')) !!}
  }]
 }
});
</script>
@endsection
