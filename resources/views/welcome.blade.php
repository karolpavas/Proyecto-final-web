@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>¡Hola! Soy Psystem</h1>
        <h2>El sofware orientado a facilitar el ejercicio profesional del area de la salud mental</h2>
    </div>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="d-flex justify-content-around align-items-start text-center">
            <div style="width: 25%">
                <h3 class="mb-4">Estadisticas Citas</h3>
                <canvas id="chartConsultas"></canvas>
            </div>

            <div style="width: 40%">
                <h3 class="mb-4">Estadisticas datos generales</h3>
                <canvas id="chartGeneral"></canvas>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <p class="text-center fs-5">Mediante Psystem podrá gestionar las citas de control por psicología y psiquiatría, además de 
                las terapias cognitivas: agendar citas, hacer segumiento mediante historia clinicas y generar remisiones clínicas.
                Tiene modulos de gestion de pacientes y empleados. Cuenta con la opción de facturación electronica
                para llevar una contabilidad organizada. 
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {


            $.ajax({
                type: "GET",
                url: "reportes/consultas",
                success: function(data) {
                    console.log(data);
                    const chartConsultas = new Chart(
                        document.getElementById("chartConsultas"), {
                            type: 'doughnut',
                            data: {
                                labels: [
                                    'Cita psicologica',
                                    'Terapia cognitiva',
                                    'Control psiquiatria'
                                ],
                                datasets: [{
                                    label: 'Consultas',
                                    data: [
                                        data.data["1"],
                                        data.data["2"],
                                        data.data["3"]
                                    ],
                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)'
                                    ],
                                    hoverOffset: 4
                                }]
                            },
                            options: {}
                        }
                    );
                }
            });

            $.ajax({
                type: "GET",
                url: "reportes/general",
                success: function(data2) {
                    const chartGeneral = new Chart(
                        document.getElementById("chartGeneral"), {
                            type: 'bar',
                            data: {
                                labels: ["Citas", "Empleados", "Pacientes", "Facturas"],
                                datasets: [{
                                    label: 'Estadisticas generales',
                                    data: [
                                        data2.data["consultas"],
                                        data2.data["empleados"],
                                        data2.data["pacientes"],
                                        data2.data["facturas"]
                                    ],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 205, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(255, 159, 64)',
                                        'rgb(255, 205, 86)',
                                        'rgb(75, 192, 192)'
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
                        }
                    );
                }
            });


            setTimeout(function() {
                $(".alert").fadeOut(700);
            }, 3000);

        });
    </script>
@endsection
