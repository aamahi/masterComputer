@extends('index')

@section('customer')
    class="btn btn-success"
@endsection

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-success text-white font-weight-bold">
                    Add Customar
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
                    <form class="form-horizontal tasi-form" method="post" action="{{route('customar')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Customar Name : </label>
                            <div class="col-lg-8">
                                <input type="text"  name="customar_name" value="{{old('customar_name')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Customar Name ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 -lg-3 control-label font-weight-bold" style="font-size:20px;">Phone Number :</label>
                            <div class="col-lg-3">
                                <input type="number" name="phone" value="{{old('phone')}}"class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Phone Number ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Address : </label>
                            <div class="col-lg-8">
                                <input type="text" name="address" value="{{old('address')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Enter address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-lg-4"></div>
                            <div class="col-lg-4">
                                <input type="submit" class="btn btn-success btn-lg" value="Add New Customar">
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
                                <th>Customar Info</th>
{{--                                <th>Phone</th>--}}
{{--                                <th>Address</th>--}}
                                <th>Due</th>
                                <th>Joma</th>
                                <th>Due/Joma</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customars as $customar)
                            <tr>
                                <th>{{$customar->customar_name}}, {{$customar->phone}}, {{$customar->address}}</th>
{{--                                <th>{{$customar->phone}}</th>--}}
{{--                                <th>{{$customar->address}}</th>--}}
                                <td>@if($customar->due){{$customar->due}}@else{{'0'}} @endif</td>
                                <td>@if($customar->joma){{$customar->joma}}@else{{'0'}} @endif</td>
                                <th>{{($customar->due)-($customar->joma)}}</th>
                                <th>
                                    <a href="{{route('bakiHisab',$customar->id)}}" class="btn btn-md btn-success"> <i class="fa fa-eye"> </i> </a>
                                    <a href="{{route('editCustomar',$customar->id)}}" class="btn btn-md btn-info"> <i class="fa fa-edit"> </i> </a>
                                    <a href="{{route('deleteCustomar',$customar->id)}}" class="btn btn-md btn-danger delete"> <i class="fa fa-trash-o"> </i> </a>
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
