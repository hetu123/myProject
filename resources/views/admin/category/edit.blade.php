@extends('layouts.app')


@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Category</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Edit Category Form</h2><br/>
        <form method="post" action="{{action('admin\CategoryController@update', $id)}}" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <!--Name-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
            </div>

            <!--Description -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Description">Description:</label>
                    <textarea class="form-control"  name="Description" >{{ $category->description }}</textarea>
                </div>
            </div>

            <!--Image Icon-->
           {{-- <div class="form-group">
                @if ("/storage/images/{{ $category->images }}")
                    <img src="{{$category->image }}">
                @else
                    <p>No image found</p>
                @endif
                image <input type="file" name="image" value="{{ $category->images }}"/>
            </div>--}}
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>Category Image</lable><br>
                    @if (public_path()."/images/{{ $category->image_icon }}")
                        <?php $image = $category['image_icon'] ?>
                        <img height="200" width="200" src="{{  asset('images/'.$image ) }}"><br>
                        {{--<img src="{{ $category->image_icon }}">--}}
                    @else
                        <p>No image found</p>
                    @endif
                        <input type="file" name="Imageicon">
                </div>
            </div>

            <!--Is-active-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsActive</lable>
                    <select name="active">
                        <option value="1"  @if($category->is_active=="Yes") selected @endif>Yes</option>
                        <option value="0"  @if($category->is_active=="No") selected @endif>No</option>
                    </select>
                </div>
            </div>

            <!--Is Populer-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsPopuler</lable>
                    <select name="populer">
                        <option value="1"  @if($category->is_active=="Yes") selected @endif>Yes</option>
                        <option value="0"  @if($category->is_active=="No") selected @endif>No</option>
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

