@extends('layouts.app')


@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Prodcut</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h2>List Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success"  href="{{ url('product/create') }}"> Add product</a>
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Is_active</th>
                <th>Is_Populer</th>
                <th>image_icon</th>
                <th width="280px">Action</th>
            </tr>


            @foreach ($products as $product)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td></td>
                    <td>{{ $product->is_active }}</td>
                    <td>{{ $product->is_populer }}</td>
                  {{--  <td><img src="{{  asset('images/1530609893index.jpeg') }}"></td>--}}
                    <?php $image = $product['cover_image'] ?>
                    <td><img height="200" width="200" src="{{  asset('images/'.$image ) }}"></td>
                    <td>
                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\ProductController@destroy', $product['id'])}}" method="POST">


                            {{--   <a class="btn btn-info" href="">Show</a>
--}}

                            <a class="btn btn-info" href="{{action('admin\ProductController@edit', $product['id'])}}">Edit</a>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="submit" value="Delete" class="btn btn-danger" >
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>


        {{-- {!! $category->links() !!}--}}

    </div>

@endsection

