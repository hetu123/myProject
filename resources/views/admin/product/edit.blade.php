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
        <form method="post" action="{{action('admin\ProductController@update', $product['id'])}}"  enctype="multipart/form-data">
        @csrf
            <input name="_method" type="hidden" value="PATCH">
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

            <!--Parent Category-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>Parent Category</lable>
                    <select id="select_preferences" name="select_preferences[]" multiple="multiple">
                   {{-- <select name="pid">--}}

                        @foreach($category as $cat)
                            <option value="{{ $cat->id}}">{{ $cat->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!--Is-active-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsActive</lable>
                    <select name="active">
                        <option value="1"  @if($product->is_active=="1") selected @endif>Yes</option>
                        <option value="0"  @if($product->is_active=="0") selected @endif>No</option>
                    </select>
                </div>
            </div>


            <!--Is Populer-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsPopuler</lable>
                    <select name="populer">
                        <option value="1"  @if($product->is_populer=="1") selected @endif>Yes</option>
                        <option value="0"  @if($product->is_populer=="0") selected @endif>No</option>
                    </select>
                </div>
            </div>


            <!-- Manage multiple image -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">

                            <button type="button" class="btn btn-default" onclick="myfunction()">Mange Product Image</button>

                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </div>

            <!--submit buttn -->
          {{--  <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>--}}

        </form>

    </div>
    <script>
        function  myfunction(){
            document.location = "http://myproject/productimage/{{ $product->id }}";

        }
    </script>
@endsection

