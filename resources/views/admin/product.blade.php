@extends('index')

@section('product')
    class="btn btn-success"
@endsection

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-success text-white font-weight-bold">
                   Add Product
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
                    <form class="form-horizontal tasi-form" method="post" action="{{route('product')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <input type="text"  name="product_name" value="{{old('product_name')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Product Name ">
                            </div>
                            <div class="col-lg-4">
                                <input type="number"  name="price" value="{{old('price')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <input type="text" name="description" value="{{old('description')}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Description or Comment">
                            </div>
                            <div class="col-lg-4">
                                <input type="submit" class="btn btn-success btn-lg" value="Add Product">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <section class="card">
                <header class="card-header bg-info text-center text-light">
                   Product Information
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>price</th>
                                <th>Description/Comment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th>{{$product->id}}</th>
                                <th>{{$product->product_name}}</th>
                                <th>{{$product->price}}</th>
                                <th>{{$product->description}}</th>
                                <th>
                                    <a href="{{route('editProduct',$product->id)}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"> </i> </a>
                                    <a href="{{route('deleteProduct',$product->id)}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash-o"> </i> </a>
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
