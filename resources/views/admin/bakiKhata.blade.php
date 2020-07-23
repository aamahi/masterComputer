@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-success text-white font-weight-bold">
                    Baki Kahta
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
                    <form class="form-horizontal tasi-form" method="post" action="{{route('bakiKhata')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Customar Name : </label>
                            <div class="col-lg-8">
                                <select id="selUser" class="form-control-lg" name="customar_id" style="font-size:50px; width: 100%;border: 0.5px solid red;">
                                    <option selected disabled>Select Customar</option>
                                    @foreach($customars as $customar)
                                        <option value='{{$customar->id}}'>{{$customar->customar_name}}({{$customar->phone}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;">Due Amount :</label>
                            <div class="col-lg-3">
                                <input type="number" name="due" value="{{old('due')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Due Amount ">
                            </div>
                            <label class="col-lg-2 col-lg-2 control-label font-weight-bold" style="font-size:20px;">Joma :</label>
                            <div class="col-lg-3">
                                <input type="number" name="joma" value="{{old('joma')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Joma ">
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
                                <input type="submit" class="btn btn-success btn-lg" value="Add to Baki Khata">
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
                        <table class="table table-bordered text-dark" id="myTable">
                            <thead>
                            <tr>
                                <th>Customar Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Due Amount</th>
                                <th>Joma Amount</th>
                                <th>Due/Joma</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customars as $customar)
                                <tr>
                                    <th>{{$customar->customar_name}}</th>
                                    <th>{{$customar->phone}}</th>
                                    <th>{{$customar->address}}</th>
                                    <th>{{$customar->due}}</th>
                                    <th>{{$customar->joma}}</th>
                                    <th>{{($customar->due)-($customar->joma)}}</th>
                                    <th>
                                        <a href="{{route('bakiHisab',$customar->id)}}" class="btn btn-md btn-info"> <i class="fa fa-eye"> </i> </a>
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
