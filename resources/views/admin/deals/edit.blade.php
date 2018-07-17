@extends('layouts.app')


@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Deal</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Deal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Edit Deal Form</h2><br/>
        <form method="post" action="{{action('admin\DealsController@update', $deal['id'])}}"  enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
        <!--Title-->

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="Title" value="{{ $deal->title }}">
                </div>
            </div>
            <!--Description -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Description">Description:</label>
                    <textarea class="form-control" data-provide="markdown" name="Description" >{{ $deal->description }}</textarea>
                </div>
            </div>

            <!--Short Description -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="short_Description">Short Description:</label>
                    <textarea class="form-control"  name="short_Description" >{{ $deal->short_description }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsActive</lable>
                    <select name="active">
                        <option value="1"  @if($deal->is_active=="1") selected @endif>Yes</option>
                        <option value="0"  @if($deal->is_active=="0") selected @endif>No</option>
                    </select>
                </div>
            </div>


            <!--Is Populer-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsPopuler</lable>
                    <select name="populer">
                        <option value="1"  @if($deal->is_populer=="1") selected @endif>Yes</option>
                        <option value="0"  @if($deal->is_populer=="0") selected @endif>No</option>
                    </select>
                </div>
            </div>

            <!--Deal-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>Product</lable>
                    <select id="select_preferences" name="select_preferences[]" multiple="multiple">
                        {{--          <select name="pid">--}}
                        <option value="0">Select Product</option>

                        @foreach($products as $product)

                            <option value="{{ $product->id}}">{{ $product->title}}</option>
                        @endforeach
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
