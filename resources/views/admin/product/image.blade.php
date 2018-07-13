@extends('layouts.app')


@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">ProductImage</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ProductImage</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Edit Product Form</h2><br/>
        <form method="post" {{--action="{{action('admin\ProductController@update', $product['id'])}}"--}}  enctype="multipart/form-data">
            @csrf
            @foreach($images as $image)
        <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <div class="form-group col-md-4">
                <label for="productimage">ProductImage:</label><br>
                @if (public_path()."/images/{{ $image->image }}")
                    <?php $imagename = $image['image'];
                    ?>
                    <img height="200" width="200" src="{{  asset('images/'.$imagename ) }}">

                    {{--<img src="{{ $category->image_icon }}">--}}
                @else
                    <p>No image found</p>
                @endif
                <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\ImageController@destroy', $image['id'])}}" method="POST">

                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" value="Delete" class="btn btn-danger" >
                </form>
              {{--  <input type="file"  name="coverImage">--}}
            </div>
        </div>
    </div>
            @endforeach
        </form>
    </div>

@endsection
