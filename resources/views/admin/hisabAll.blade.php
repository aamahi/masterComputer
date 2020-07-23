@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <!-- invoice start-->
            <section>
                <div class="card card-primary">
                    <!--<div class="card-heading navyblue"> INVOICE</div>-->
                    <div class="card-body">
                        <div class="row invoice-list">
                            <div class="col-lg-4 col-sm-4">
                                <h4>BILLING ADDRESS</h4>
                                <p>
                                    {{$customar_info->customar_name}} <br>
                                    {{$customar_info->address}}<br>
                                    Phone : {{$customar_info->phone}}
                                </p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <h4>Master Computer</h4>
                                <ul class="unstyled">
                                    <li>Union office Bazar, Zokigonj, Sylhet</li>
                                    <li>Phone : 01730171884 (Bkash Agent)</li>
                                    <li>Email Address : mastercomputerbd@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Description</th>
                                <th>Due Amount</th>
                                <th class="">Joma</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total_due =0;
                                $total_joma =0;
                            @endphp
                            @foreach($hisabs as $hisab)
                                <tr>
                                <td>{{($hisab->created_at)->format('d-m-Y')}}</td>
                                <td>{{($hisab->user)->name}}</td>
                                <td>{{$hisab->comment}}</td>
                                <td>@if($hisab->due){{$hisab->due}}@else{{'0'}} @endif</td>
                                    <td>@if($hisab->joma){{$hisab->joma}}@else{{'0'}} @endif</td>
                                <td>{{($hisab->due)-($hisab->joma)}}</td>

                                    @php
                                        $total_due +=$hisab->due;
                                        $total_joma +=$hisab->joma;
                                    @endphp
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-end">
                            <div class="col-lg-4 invoice-block ">
                                <ul class="unstyled amounts">
                                    <li style="margin-right: 20px; font-size: 15px; "><strong>Total Due :</strong> {{$total_due}}</li>
                                    <li style="margin-right: 20px; font-size: 15px; "><strong>Total Joma :</strong> {{$total_joma}}</li>
                                    <li style="margin-right: 20px; font-size: 15px;"><strong>Due/Change</strong>{{($total_due)-($total_joma)}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center invoice-btn">
                            <a class="btn btn-info text-light"><i class="fa fa-reply"></i> Back </a>
                            <a class="btn btn-info text-light" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- invoice end-->
        </section>
    </section>

@endsection
