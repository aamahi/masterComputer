@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-success text-white font-weight-bold">
                    Bkash
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
                    <form class="form-horizontal tasi-form" method="post" action="{{route('bkash')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Bkash Number : </label>
                            <div class="col-lg-8">
{{--                                <textarea id="product_details" cols="108" rows="3.5"  name="number">  product Details...--}}
{{--                                </textarea>--}}
{{--                                <textarea name="number" class="form-control-lg" style="font-size:75px; font-size:75px;height: 151px;width: 100%"></textarea>--}}
                                <input type="text"  name="number" value="{{old('number')}}" class="form-control-lg" style="font-size:75px; font-size:75px;height: 151px;width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Bkash No:">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 -lg-3 control-label font-weight-bold" style="font-size:20px;">Amount :</label>
                            <div class="col-lg-3">
                                <input type="number" name="amount" value="{{old('amount')}}"class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Enter Amount ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;">Cash out :</label>
                            <div class="col-lg-3">
                                <input type="number" name="recive" value="{{old('recive')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Receive Amount ">
                            </div>
                            <label class="col-lg-2 col-lg-2 control-label font-weight-bold" style="font-size:20px;">Cash In:</label>
                            <div class="col-lg-3">
                                <input type="number" name="send" value="{{old('send')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Send to ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Comment : </label>
                            <div class="col-lg-8">
                                <input type="text" name="comment" value="{{old('comment')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Enter Comment">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-lg-4"></div>
                            <div class="col-lg-4">
                                <input type="submit" class="btn btn-success btn-lg" value="Bkash Compleate">
                            </div>
                            <div class="col-lg-4 col-lg-4"></div>
                        </div>

                    </form>
                </div>
            </section>
            <section class="card">
                <header class="card-header bg-info text-center text-light">
                   ALL Report
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Number</th>
                                <th>Amout</th>
                                <th>Receive Amount</th>
                                <th>Send To</th>
                                <th>User</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bkashInfo as $bkash)
                            <tr>
                                <th>{{$bkash->created_at->format('d/m/Y (h:i-A)')}}</th>
                                <th>{{$bkash->number}}</th>
                                <th>{{$bkash->amount}}</th>
                                <th>
                                    @if($bkash->recive)
                                        @if($bkash->recive==1)
                                            <a href="{{route('reciveBkash',$bkash->id)}}" class="btn btn-sm btn-danger">Not Receive ({{$bkash->amount}})</a>
                                        @elseif(($bkash->recive)!=($bkash->amount))
                                            <a href="{{route('reciveBkash',$bkash->id)}}" class="btn btn-sm btn-danger">Not Receive ({{($bkash->amount)-($bkash->recive)}})</a>
                                        @else
                                            {{$bkash->amount}}
                                        @endif
                                    @else

                                    @endif
                                </th>
                                <th>
                                    @if($bkash->send)
                                        @if($bkash->send==1)
                                            <a href="{{route('sendBkash',$bkash->id)}}" class="btn btn-sm btn-danger">Not Send({{$bkash->amount}})</a>
                                        @elseif(($bkash->send)!=($bkash->amount))
                                            <a href="{{route('sendBkash',$bkash->id)}}" class="btn btn-sm btn-danger">Not Send ({{($bkash->amount)-($bkash->send)}})</a>
                                        @else
                                            {{$bkash->amount}}
                                        @endif
                                    @else

                                    @endif
                                </th>
                                <th>{{($bkash->user)->name}}</th>
                                <th>{{$bkash->comment}}</th>
                                <th>
                                   <a href="{{route('deleteBkash',$bkash->id)}}" class="btn btn-md btn-danger delete"> <i class="fa fa-trash-o"> </i> </a>
                                   <a href="{{route('editBkash',$bkash->id)}}" class="btn btn-md btn-info"> <i class="fa fa-edit"> </i> </a>
                                </th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>

        </section>
    </section>

@endsection
