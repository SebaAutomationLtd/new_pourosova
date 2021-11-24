@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ড্যাশবোর্ড</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড / হোম
                </a>
            </li>

        </ol>
    </section>


    <!--Second Row Start-->
    <div class="row custom-dashboard">

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-success fa fa-fw fa-bar-chart-o"></i>
                    </div>
                    <div class="text-right">
                        <div class="h2">5454.5</div>
                        <span>সর্বমোট রেজিষ্ট্রেশন</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-success d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-warning fa fa-fw fa-bars"></i>
                    </div>
                    <div class="text-right">
                        <div class="h2">5454.5</div>
                        <span>মোট বসতবাড়ি</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-warning d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-info fa fa-fw fa-bullhorn"></i>
                    </div>
                    <div class="text-right">
                        <div class="h2">5454.5</div>
                        <span>মোট বাণিজ্যিক হোল্ডিং</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-info d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-primary fa fa-fw fa-download"></i>
                    </div>
                    <div class="text-right">
                        <div class="h2">5454.5</div>
                        <span>মোট ব্যাবসা প্রতিষ্ঠান</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-primary d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-secondary fa fa-fw fa-tasks"></i>
                    </div>
                    <div class="text-right">
                        <div class="h2">5454.5</div>
                        <span>মোট সনদের আবেদন</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-secondary d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-danger fa fa-fw fa-sitemap"></i>
                    </div>
                    <div class="text-right">
                        <div class="h2">5454.5</div>
                        <span>মোট সনদ গ্রহীতা</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-danger d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-primary fa fa-fw fa-signal"></i>
                    </div>
                    <div class="text-right">
                        <div class="h2">5454.5</div>
                        <span>মোট আয়</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-primary d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>

        <!--Item-->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-content">
                <div class="d-flex justify-content-between p-3">
                    <div class="display-4">
                        <i class="text-warning fa fa-fw fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        <div class="h2">5454.5</div>
                        <span>মোট বকেয়া কর</span>
                    </div>
                </div>
                <div class="db-link">
                    <a href="#" class="bg-warning d-block">
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Second Row Start-->
    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>

        <div class="col-md-6">
            <canvas id="myChart2" width="400" height="200"></canvas>
        </div>
    </div>

@stop

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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


        const ctx = document.getElementById('myChart2');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
        });
    </script>
@endpush
