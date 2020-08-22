@extends('index')
@section('content')

    <section id="main-content">
        <section class="wrapper">

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
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="value">
                            <h1 class="text-dark font-weight-bold">
                                @php
                                    $totalSale =0;
                                    foreach(\App\Model\mcSale::all() as $sale){
                                        $totalSale +=$sale->amount;
                                    }
                                @endphp
                                {{$totalSale}}
                            </h1>
                            <p class="text-dark font-weight-bold">Total Sales</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol yellow">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="value">
                            <h1 class="text-dark font-weight-bold">
                                @php
                                    $today = \Carbon\Carbon::now()->toDateString();
                                    $todaySale =0;
                                    foreach(\App\Model\mcSale::where('month',$today)->get() as $sale){
                                        $todaySale +=$sale->amount;
                                    }
                                @endphp
                                {{$todaySale}}
                            </h1>
                            <p class="text-dark font-weight-bold">Today Sales</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="card">
                        <div class="symbol blue">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                        <div class="value">
                            <h1 class="text-dark font-weight-bold">
                                @php
                                    $currentMonth = date('m');
                                    $monthlySale = 0;
                                    $data = \App\Model\mcSale::whereRaw('MONTH(created_at) = ?',[$currentMonth])->get();
                                    foreach ($data as $sale){
                                        $monthlySale +=$sale->amount;
                                    }
                                @endphp
                                {{$monthlySale}}
                            </h1>
                            <p class="text-dark font-weight-bold">This Month Sale</p>
                        </div>
                    </section>
                </div>
            </div>
            <section class="card">
                <header class="card-header text-center bg-secondary text-white font-weight-bold">
                    Add Sale in Master Computer
                </header>
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                {{$error}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    <form class="form-horizontal tasi-form" method="post" action="{{route('mcsale')}}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-lg-3">
                                <input type="number" name="amount" value="{{old('amount')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Amount">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="description" value="{{old('description')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Description">
                            </div>
                            <div class="col-lg-3">
                                <input type="submit" class="btn btn-success btn-lg" value="Add to Sale (MC)">
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </form>
                </div>
            </section>
            <section class="card">
                <header class="card-header bg-warning text-center text-white font-weight-bold">
                   Sales Report in Master Computer
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>User</th>
                                <th>Description</th>
{{--                                <th>Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mcSales as $sale)
                                <tr>
                                    <th>{{$sale->id}}</th>
                                    <th>{{$sale->created_at->format('d/m/y')}}</th>
                                    <th>{{$sale->amount}}</th>
                                    <th>{{($sale->user)->name}}</th>
                                    <th>{{$sale->description}}</th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>
@endsection
