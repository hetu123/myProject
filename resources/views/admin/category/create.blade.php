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
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Add Category Form</h2><br/>
        <form method="post" action="{{url('addcategory')}}" enctype="multipart/form-data">
            @csrf
            <!--Name-->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" name="Name">
                    </div>
                </div>
            <!--Description -->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="Description">Description:</label>
                        <textarea class="form-control"  name="Description"></textarea>
                    </div>
                </div>




            <!--Image Icon-->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <lable>Icon Image</lable>
                      <input type="file" class="form-control" name="Imageicon">
                    </div>
                </div>

                <!--Parent Category-->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <lable>Parent Category</lable>
                        <select id="select_preferences" name="select_preferences[]" multiple="multiple">
              {{--          <select name="pid">--}}
                            <option value="0">Select Parent Category</option>
                            @foreach($parent as $parent)

                                <option value="{{ $parent->id}}">{{ $parent->name}}</option>
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
                            <option value="0">Select Option</option>
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
                            <option value="0">Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

            <!--submit buttn -->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:60px">

                    </div>
                </div>

        </form>
    </div>

@endsection
