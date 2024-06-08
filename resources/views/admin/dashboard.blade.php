<x-app-layout>
    @section('title', __('Panel de control'))

    @section('content')
        <div class="title">
            <h1>{{ __("Panel de control")}}</h1>
            <hr>
        </div>

       <div class="row dashboard gy-4">
        <div class="col-xl-7">
            <div class="card card-secondary">
                <div class="card-h">
                    <div class="row">
                        <div class="col-8">
                            <h3><i class="fa-solid fa-graduation-cap text-primary me-2"></i> Profesores registrados hoy</h3>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-primary fw-bold">Semanal</span>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="img-fluid" id="teachersChart"></div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card card-secondary fw-bold mb-4">
                <div class="card-h">
                    <div class="row">
                        <div class="col-10">
                            <h3><i class="fa-solid fa-star me-3 text-primary"></i>Valoraciones</h3>
                        </div>
                        <div class="col-2 text-end">
                            <a class="btn-link" href="{{ route('admin.reviews') }}"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                    <hr>
                </div>
                <p><i class="fa-solid fa-user-tag me-2 text-primary"></i> Valoraciones totales: <span class="text-primary">{{ $totalReviews }}</span></p>
                <p><i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i> Profesor más valorado: <span class="text-primary">{{ $userMostReviewed }} </span></p>
                <p class="mb-0"><i class="fa-solid fa-calendar-day me-2 text-primary"></i> Última valoración: <span class="text-primary">{{ $latestReview }}</span></p>
            </div>

            <div class="card card-secondary fw-bold">
                <div class="card-h">
                    <h3><i class="fa-solid fa-wifi me-3 text-primary"></i>Sesiones</h3>
                    <hr>
                </div>
                <p><i class="fa-solid fa-users-viewfinder me-2 text-primary"></i> Sesiones totales: <span
                    class="text-primary">{{ $totalSessions }}</span> <span class="text-light">(Últimas 24h)</span></p>
            <p><i class="fa-solid fa-user-check me-2 text-primary"></i> Sesiones de profesores: <span
                    class="text-primary">{{ $userSessions }}</span> <span class="text-light">(Últimas 24h)</span></p>
            <p class="mb-0"><i class="fa-solid fa-user-xmark me-2 text-light"></i> Sesiones de alumnos: <span
                    class="text-light">{{ $nonUserSessions }} (Últimas 24h)</span></p>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                var teachersData = @json($teachersGroupByDay);

                // Function to convert numeric month to abbreviated month name
                function getMonthName(month) {
                    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    return months[month - 1];
                }

                // Get current date
                var currentDate = new Date();

                // Prepare data for the last 7 days
                var seriesData = [];
                var categoriesData = [];
                for (var i = 0; i < 8; i++) {
                    var date = new Date(currentDate);
                    date.setDate(date.getDate() - i);
                    var day = (date.getDate() < 10 ? '0' : '') + date.getDate();
                    var monthName = getMonthName(date.getMonth() + 1);

                    var dateString = day + ' ' + monthName;

                    // Check if teachers data is available for the current date
                    if (teachersData[dateString]) {
                        // Push the number of teachers for the current date to seriesData
                        seriesData.unshift(teachersData[dateString].length);
                    } else {
                        // If no teachers data available, push 0
                        seriesData.unshift(0);
                    }
                    // Push the date string to categoriesData
                    categoriesData.unshift(dateString);
                }

                var options = {
                    series: [{
                        name: 'teachers',
                        data: seriesData
                    }],
                    chart: {
                        type: 'area',
                        height: 350,
                        stacked: true,
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#0078b9', '#004a72'],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    grid: {
                        borderColor: '#cacaca' // Change this to your desired color
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            opacityFrom: 0.6,
                            opacityTo: 0.8,
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                        },
                    },
                    xaxis: {
                        categories: categoriesData,
                        labels: {
                            rotate: -45,
                            style: {
                                colors: '#000',
                                fontFamily: 'Montserrat',
                                fontWeight: 700
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: '#3d3d3d' // Change this to your desired color
                            }
                        }
                    },
                };

                var chart = new ApexCharts(document.querySelector("#teachersChart"), options);
                chart.render();
            </script>
        @endpush
</x-app-layout>