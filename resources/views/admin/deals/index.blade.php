@extends('layouts.app')


@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Deals</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Deals</li>
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
                    <h2>List Deals</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ url('deals/create') }}"> Add Deal</a>
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
                <th>Title</th>
                <th>Description</th>
                <th>Short_Description</th>
                <th>Is_active</th>
                <th>Is_Populer</th>
                <th>Favorite count</th>
                <th width="280px">Action</th>
            </tr>

            <tr>
                <td></td>
                <td>
                    <form method="get" action="{{url('dealsearch')}}" enctype="multipart/form-data">
                        {!! Form::text('title', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for title...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('dealsearch')}}" enctype="multipart/form-data">
                        {!! Form::text('description', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for title...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('dealsearch')}}" enctype="multipart/form-data">
                        {!! Form::text('short_description', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for title...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" name="form" action="{{url('dealsearch')}}" enctype="multipart/form-data">
                        <select name="active" onchange = "form.submit();">
                            <option>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form method="get" name="form1" action="{{url('dealsearch')}}" enctype="multipart/form-data">
                        <select name="populer" onchange = "form1.submit();">
                            <option>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('dealsearch')}}" enctype="multipart/form-data">
                        {!! Form::text('favorite_cnt', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for title...')) !!}

                    </form>
                </td>
            </tr>
            @foreach ($deals as $deal)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $deal->title }}</td>
                    <td>{{ $deal->description }}</td>
                    <td>{{ $deal->short_description }}</td>
                    <td>{{ $deal->is_active }}</td>
                    <td>{{ $deal->is_populer }}</td>
                    <td>{{ $deal->favorite_cnt }}</td>
                  <td>
                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\DealsController@destroy', $deal['id'])}}" method="POST">


                            {{--   <a class="btn btn-info" href="">Show</a>
--}}

                            <a class="btn btn-info" href="{{action('admin\DealsController@edit', $deal['id'])}}">Edit</a>
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

