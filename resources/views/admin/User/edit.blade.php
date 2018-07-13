@extends('layouts.app')


@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Edit User Form</h2><br/>
        <form method="post" action="{{action('admin\UserController@update', $user['id'])}}"   enctype="multipart/form-data">
        @csrf
            <input name="_method" type="hidden" value="PATCH">
        <!--UserName-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="UserName">UserName:</label>
                    <input type="text" class="form-control" name="UserName" value="{{ $user->username }}">
                </div>
            </div>
            <!--FirstName-->

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="FirstName">FirstName:</label>
                    <input type="text" class="form-control" name="FirstName" value="{{ $user->first_name }}">
                </div>
            </div>

            <!--LastName-->

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="LastName">LastName:</label>
                    <input type="text" class="form-control" name="LastName" value="{{ $user->last_name }}">
                </div>
            </div>
            <!--Email-->

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
            </div>

            <!--Email-->

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="phone_number">Phone number:</label>
                    <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
                </div>
            </div>

            <!--Is-active-->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <lable>IsActive</lable>
                    <select name="active">
                        <option value="1"  @if($user->is_active=="Yes") selected @endif>Yes</option>
                        <option value="0"  @if($user->is_active=="No") selected @endif>No</option>
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
