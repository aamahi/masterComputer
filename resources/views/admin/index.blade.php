@extends('index')
@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!--state overview start-->
            <div class="row state-overview">
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol terques">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <div class="value">
                            <h1 class="text-dark font-weight-bold">
                                @php
                                    $totalDue =0;
                                    foreach(\App\Model\Customar::all() as $customar){
                                        $totalDue +=(($customar->due)-($customar->joma));
                                    }
                                @endphp
                                {{$totalDue}}
                            </h1>
                            <p class="text-dark font-weight-bold">Total Due</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol red">
                            <i class="fa fa-tags"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count2">
                                0
                            </h1>
                            <p>Sales</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol yellow">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="value">
                            <h1>
                               55
                            </h1>
                            <p>Today Sell Item</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol blue">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count4">
                                0
                            </h1>
                            <p>Blance</p>
                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>
@endsection
