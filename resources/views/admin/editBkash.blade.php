@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-success text-white font-weight-bold">
                    Edit Bkash ({{$bkashInfo->number}})
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
                    <form class="form-horizontal tasi-form" method="post" action="{{url('update/bkash/'.$bkashInfo->id)}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Bkash Number : </label>
                            <div class="col-lg-8">
                                <input type="text"  name="number" value="{{$bkashInfo->number}}" class="form-control-lg" style="font-size:75px; font-size:75px;height: 151px;width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Bkash No:">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 -lg-3 control-label font-weight-bold" style="font-size:20px;">Amount :</label>
                            <div class="col-lg-3">
                                <input type="number" name="amount" value="{{$bkashInfo->amount}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Enter Amount ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;">Receive Amount :</label>
                            <div class="col-lg-3">
                                <input type="number" name="recive" value="{{$bkashInfo->recive}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Receive Amount ">
                            </div>
                            <label class="col-lg-2 col-lg-2 control-label font-weight-bold" style="font-size:20px;">Send To :</label>
                            <div class="col-lg-3">
                                <input type="number" name="send" value="{{$bkashInfo->send}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Send to ">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-lg-3 control-label font-weight-bold" style="font-size:20px;"> Comment : </label>
                            <div class="col-lg-8">
                                <input type="text" name="comment" value="{{$bkashInfo->comment}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Enter Comment">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-lg-4"></div>
                            <div class="col-lg-4">
                                <input type="submit" class="btn btn-success btn-lg" value="Update Bkash">
                            </div>
                            <div class="col-lg-4 col-lg-4"></div>
                        </div>

                    </form>
                </div>
            </section>

        </section>
    </section>

@endsection
