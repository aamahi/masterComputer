@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-7">
                    <section class="card">
                        <header class="card-header bg-secondary text-center text-light">
                            Flexiload
                        </header>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                <h4>Mama, Copy button tik moto kaj kore na !! Don't use it .</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Customar Name</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($flexiloads as $flexiload)
                                            <tr>
                                                <td>{{$flexiload->name}}</td>
                                                <td>
                                                     <p id="signature_container">{{$flexiload->phone}}</p>
                                                </td>
                                                <td><input class="btn btn-info" type="button" onclick="selectElementContents( document.getElementById('signature_container') );" value="Copy to Clipboard"></td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-5">
                    <section class="card">
                        <header class="card-header bg-success text-center text-light">
                            Add Flexiload
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
                            <form action="{{route('flexiload')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>

@endsection
