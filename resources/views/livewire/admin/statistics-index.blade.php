<div>
    <div class="row ">
        <div class="col ">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <p><strong>{{strtoupper($mesActual)}}</strong> {{ $anioActual }}</p>
                        <p><Strong>TOTAL: </Strong>{{ $totalMes }}</p>
                    </div>
                </div>
                <div class="card-body">
                    @if ($totalMes > 0)
                        <canvas id="estadistica-venta" width="250" height="100%"></canvas>
                    @else
                        <div>
                            <strong>No hay ventas en este mes :/</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            let myChart;
            var ctx = document.getElementById('estadistica-venta').getContext('2d');

            $(document).ready(function() {
                grafico();
            });


            function grafico() {
                const cData = JSON.parse(`<?php echo $data; ?>`)
                console.log(cData);
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: cData.label,
                        datasets: [{
                            label: 'VENTAS DIARIAS EN EL ULTIMO MES',
                            data: cData.data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        </script>
    @endpush
</div>
