@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-success text-white font-weight-bold">
                    Joma Hisab
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
                    <form class="form-horizontal tasi-form" method="post" action="{{route('joma')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Customar Name : </label>
                            <div class="col-lg-8">
                                <select id="selUser" class="form-control-lg" name="customar_id">
                                    <option selected disabled>Select Customar</option>
                                    @foreach($customars as $customar)
                                        <option value='{{$customar->id}}'>{{$customar->customar_name}} ({{$customar->phone}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;">Withdraw :</label>
                            <div class="col-lg-3">
                                <input type="number" name="withdraw" value="{{old('withdraw')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Withdraw Amount ">
                            </div>
                            <label class="col-lg-2 col-lg-2 control-label font-weight-bold" style="font-size:20px;">Deposite :</label>
                            <div class="col-lg-3">
                                <input type="number" name="deposite" value="{{old('deposite')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Deposite ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Description : </label>
                            <div class="col-lg-8">
                                <input type="text" name="description" value="{{old('description')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Write Description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-lg-4"></div>
                            <div class="col-lg-4">
                                <input type="submit" class="btn btn-success btn-lg" value="Add to Joma Khata">
                            </div>
                            <div class="col-lg-4 col-lg-4"></div>
                        </div>

                    </form>
                </div>
            </section>
            <section class="card">
                <header class="card-header bg-info text-center text-light">
                    All  deposite Hisab
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark" id="myTable">
                            <thead>
                            <tr>
                                <th>Customar Name</th>
                                <th>Withdraw Amount</th>
                                <th>Deposite Amount</th>
                                <th>Withdraw/Deposite</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jomas as $joma)
                                <tr>
                                    <th>{{($joma->customar)->customar_name}}</th>
                                    <th>@if($joma->withdraw){{$joma->withdraw}}@else{{'0'}} @endif</th>
                                    <th>@if($joma->deposite){{$joma->deposite}}@else{{'0'}} @endif</th>
                                    <th>{{($joma->withdraw)-($joma->deposite)}}</th>
                                    <th>
                                        <a href="{{route('viewJoma',$joma->customar_id)}}" class="btn btn-md btn-info"> <i class="fa fa-eye"> </i> View</a>
{{--                                        <a href="{{route('deleteCustomar',$joma->id)}}" class="btn btn-md btn-danger delete"> <i class="fa fa-trash-o"> </i> </a>--}}
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
