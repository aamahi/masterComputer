@extends('index')

@section('product')
    class="btn btn-secondary text-light"
@endsection

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header text-center bg-success text-white font-weight-bold">
                  Edit Product
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
                    <form class="form-horizontal tasi-form" method="post" action="{{route('editProduct',$product->id)}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <input type="text"  name="product_name" value="{{$product->product_name}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Product Name ">
                            </div>
                            <div class="col-lg-4">
                                <input type="number"  name="price" value="{{$product->price}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <input type="text" name="description" value="{{$product->description}}" class="form-control-lg" style="font-size:20px; width: 100%;border: 0.5px solid #d0d0d0;" placeholder="Description or Comment">
                            </div>
                            <div class="col-lg-4">
                                <input type="submit" class="btn btn-success btn-lg" value="Update Product">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </section>
    </section>

@endsection
