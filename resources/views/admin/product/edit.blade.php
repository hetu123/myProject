@extends('layouts.app')


@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Product</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Edit Product Form</h2><br/>
        <form method="post"  {{--action="{{action('admin\ProdutController@update', $id)}}"--}} enctype="multipart/form-data">
        @csrf
        <!--Name-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="title">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{  $product->title }}">
                </div>
            </div>
            <!--Description -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Description">Description:</label>
                    <textarea class="form-control"  name="description">{{ $product->description }}</textarea>
                </div>
            </div>

            <!--Image Icon-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <div class="form-group col-md-4">
                        <label for="coverimage">CoverImage:</label><br>
                        @if (public_path()."/images/{{ $product->cover_image }}")
                            <?php $image = $product['cover_image'] ?>
                            <img height="200" width="200" src="{{  asset('images/'.$image ) }}">
                            {{--<img src="{{ $category->image_icon }}">--}}
                        @else
                            <p>No image found</p>
                        @endif

                            <input type="file"  name="coverImage">
                    </div>
                </div>
            </div>

            <!--Image Icon-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="coverimage">ProdutImage:</label><br>
                    @foreach($img as $i)


                         @if (public_path()."images/ {{ $i->image }}")
                            <?php $image1 = $i->image ?>
                                <img height="200" width="200"  src="{{  asset('images/'.$image1 ) }}">
                          @else
                             <p>No image found</p>
                          @endif

                @endforeach
                    <br>
                    <input required type="file"  name="images[]"  multiple>
                    {{--<input type="file" name="coverImage">--}}
                </div>
            </div>

            <!--Is-active-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsActive</lable>
                    <select name="active">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <!--Is Populer-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsPopuler</lable>
                    <select name="populer">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <!--submit buttn -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>
    </div>

@endsection
