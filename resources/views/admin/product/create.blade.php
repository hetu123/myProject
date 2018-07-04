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
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Add Product Form</h2><br/>
        <form method="post" action="{{url('product')}}" enctype="multipart/form-data">
        @csrf
        <!--Name-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Prodcut Title:</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>

            <!--Description -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Description">Description:</label>
                    <textarea class="form-control"  name="description"></textarea>
                </div>
            </div>

            <!--Image Icon-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="coverimage">CoverImage:</label>
                    <input type="file" class="form-control" name="coverImage">
                </div>
            </div>



            <!--Product Image-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="productimage">ProdutImage:</label>

                    <input required type="file" class="form-control" name="images[]"  multiple>
                    {{--<input type="file" name="coverImage">--}}
                </div>
            </div>


            <!--Parent Category-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>Parent Category</lable>
                    <select name="pid">
                        <option value="0">Select Parent Category</option>
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
                        <option value="0">Select Parent Category</option>
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
                        <option value="0">Select Parent Category</option>
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
