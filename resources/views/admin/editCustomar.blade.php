@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-dark text-white font-weight-bold">
                    Edit Customar - {{$customarInfo->customar_name}}
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
                    <form class="form-horizontal tasi-form" method="post" action="{{route('Updatecustomar',$customarInfo->id)}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Customar Name : </label>
                            <div class="col-lg-8">
                                <input type="text"  name="customar_name" value="{{$customarInfo->customar_name}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Customar Name ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 -lg-3 control-label font-weight-bold" style="font-size:20px;">Phone Number :</label>
                            <div class="col-lg-3">
                                <input type="number" name="phone" value="{{$customarInfo->phone}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Phone Number ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Address : </label>
                            <div class="col-lg-8">
                                <input type="text" name="address" value="{{$customarInfo->address}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Enter address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-lg-4"></div>
                            <div class="col-lg-4">
                                <input type="submit" class="btn btn-success btn-lg" value="Update Customar">
                            </div>
                            <div class="col-lg-4 col-lg-4"></div>
                        </div>

                    </form>
                </div>
            </section>

        </section>
    </section>

@endsection
