@extends('index')
@section('content')

{{--    <section id="main-content">--}}
{{--        <section class="wrapper">--}}
{{--            <!--state overview start-->--}}
{{--            <div class="row state-overview">--}}
{{--                <div class="col-lg-3 col-sm-6">--}}
{{--                    <section class="card">--}}
{{--                        <div class="symbol terques">--}}
{{--                            <i class="fa fa-dollar"></i>--}}
{{--                        </div>--}}
{{--                        <div class="value">--}}
{{--                            <h1>--}}
{{--                               @php--}}
{{--                               $today_income=0;--}}
{{--                                    foreach($today_incomes as $income){--}}
{{--                                         $today_income +=$income->total;--}}
{{--                                    }--}}
{{--                               @endphp--}}
{{--                                {{$today_income }}--}}
{{--                            </h1>--}}
{{--                            <p>Today Total sale</p>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-sm-6">--}}
{{--                    <section class="card">--}}
{{--                        <div class="symbol red">--}}
{{--                            <i class="fa fa-tags"></i>--}}
{{--                        </div>--}}
{{--                        <div class="value">--}}
{{--                            <h1 class=" count2">--}}
{{--                                0--}}
{{--                            </h1>--}}
{{--                            <p>Sales</p>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-sm-6">--}}
{{--                    <section class="card">--}}
{{--                        <div class="symbol yellow">--}}
{{--                            <i class="fa fa-shopping-cart"></i>--}}
{{--                        </div>--}}
{{--                        <div class="value">--}}
{{--                            <h1>--}}
{{--                                {{\App\Model\Invoice::where('created_at',\Carbon\Carbon::now()->toDateString())->count()}}--}}
{{--                            </h1>--}}
{{--                            <p>Today Sell Item</p>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-sm-6">--}}
{{--                    <section class="card">--}}
{{--                        <div class="symbol blue">--}}
{{--                            <i class="fa fa-bar-chart-o"></i>--}}
{{--                        </div>--}}
{{--                        <div class="value">--}}
{{--                            <h1 class=" count4">--}}
{{--                                0--}}
{{--                            </h1>--}}
{{--                            <p>Blance</p>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--state overview end-->--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4">--}}
{{--                    <!--user info table start-->--}}
{{--                    <section class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="#" class="task-thumb">--}}
{{--                                <img src="{{asset('asset/img/avatar1.jpg')}}" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="task-thumb-details">--}}
{{--                                <h1><a href="#">{{Auth::user()->name}}</a></h1>--}}
{{--                                <p>Manager</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <table class="table table-hover personal-task">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <i class=" fa fa-tasks"></i>--}}
{{--                                </td>--}}
{{--                                <td>New Task Issued</td>--}}
{{--                                <td> 02</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <i class="fa fa-exclamation-triangle"></i>--}}
{{--                                </td>--}}
{{--                                <td>Task Pending</td>--}}
{{--                                <td> 14</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <i class="fa fa-envelope"></i>--}}
{{--                                </td>--}}
{{--                                <td>Inbox</td>--}}
{{--                                <td> 45</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <i class=" fa fa-bell-o"></i>--}}
{{--                                </td>--}}
{{--                                <td>New Notification</td>--}}
{{--                                <td> 09</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </section>--}}
{{--                    <!--user info table end-->--}}
{{--                </div>--}}
{{--                <div class="col-lg-8">--}}
{{--                    <!--work progress start-->--}}
{{--                    <section class="card">--}}
{{--                        <div class="card-body progress-card">--}}
{{--                            <div class="task-progress">--}}
{{--                                <h1>Today Report</h1>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <table class="table table-bordered" id="myTable">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Date</th>--}}
{{--                                <th>Customar Name</th>--}}
{{--                                <th>User</th>--}}
{{--                                <th>Pay</th>--}}
{{--                                <th>Due</th>--}}
{{--                                <th>Total</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @forelse($invoices as $invoice)--}}
{{--                                <tr>--}}
{{--                                    <th>{{$invoice->created_at->format('d/m/Y')}}</th>--}}
{{--                                    <th>{{($invoice->customar)->customar_name}}</th>--}}
{{--                                    <th>{{Auth::user()->name}}</th>--}}
{{--                                    <th>@if($invoice->pay==0)0.00 @else {{$invoice->pay}} @endif Taka</th>--}}
{{--                                    <th>@if($invoice->due==0)0.00 @else {{$invoice->due}} @endif Taka</th>--}}
{{--                                    <th>{{$invoice->total}} taka</th>--}}
{{--                                    <th>--}}
{{--                                        <a href=""  class="btn btn-md btn-info" data-toggle="modal" data-toggle="modal" data-target="#exampleModalLong"> <i class="fa fa-eye"> </i> </a>--}}
{{--                                        --}}{{--                                    <a href="{{route('show_customar',$invoice->id)}}"  class="btn btn-md btn-success" > <i class="fa fa-money"> </i> </a>--}}
{{--                                        --}}{{--                                    <a href="{{route('update_customar',$invoice->id)}}" class="btn btn-md btn-info"> <i class="fa fa-pencil-square-o"> </i> </a>--}}
{{--                                        --}}{{--                                    <a href="{{route('delete_customar',$invoice->id)}}" class="btn btn-md btn-danger delete"> <i class="fa fa-trash-o"> </i> </a>--}}
{{--                                    </th>--}}
{{--                                </tr>--}}
{{--                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful conten--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @empty--}}
{{--                                <tr class="bg-light">--}}
{{--                                    <td colspan="50" class="text-center text-dark"> No Report Found !</td>--}}
{{--                                </tr>--}}
{{--                            @endforelse--}}
{{--                        </table>--}}
{{--                    </section>--}}
{{--                    <!--work progress end-->--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </section>--}}
{{--    </section>--}}
@endsection
