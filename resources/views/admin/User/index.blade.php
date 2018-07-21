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
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                    <h2>List User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ url('user/create') }}"> Add User</a>
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
                <th>Number</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>email</th>
                <th>Phonenumber</th>
                <th>is_active</th>
                <th width="280px">Action</th>
            </tr>

            <tr>
                <td></td>
                <td>
                    <form method="get" action="{{url('usersearch')}}" enctype="multipart/form-data">
                        {!! Form::text('username', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for a username...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('usersearch')}}" enctype="multipart/form-data">
                        {!! Form::text('first_name', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for a username...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('usersearch')}}" enctype="multipart/form-data">
                        {!! Form::text('last_name', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for a username...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('usersearch')}}" enctype="multipart/form-data">
                        {!! Form::text('email', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for a username...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('usersearch')}}" enctype="multipart/form-data">
                        {!! Form::text('phone_number', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for a username...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" name="form" action="{{url('usersearch')}}" enctype="multipart/form-data">
                        <select name="active" onchange = "form.submit();">
                            <option>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </form>
                </td>
               {{-- <td>
                    <form method="get" name="form1" action="{{url('productsearch')}}" enctype="multipart/form-data">
                        <select name="verified" onchange = "form1.submit();">
                            <option>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </form>
                </td>--}}
            </tr>
            @foreach ($users as $user)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->first_name }}</td>
                    {{--   $user = DB::table('category')->where('id', $cat['pid'] )->first()
                    --}}

                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->is_active  }}</td>


                    <td>
                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\UserController@destroy', $user['id'])}}" method="POST">


                            {{--   <a class="btn btn-info" href="">Show</a>
--}}

                            <a class="btn btn-info" href="{{action('admin\UserController@edit', $user['id'])}}">Edit</a>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="submit" value="Delete" class="btn btn-danger" >
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>




    </div>

@endsection


