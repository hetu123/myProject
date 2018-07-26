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
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid">
            <div>
                <h4>Date range</h4>
                <form method="get" action="{{url('search')}}" enctype="multipart/form-data">
                    <input type="text" class="daterange" name="range"/>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <h2>List Category</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ url('addcategory/create') }}"> Add category</a>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parent Category</th>
                    <th>Is_active</th>
                    <th>Is_Populer</th>
                    <th>Created date</th>
                    <th>image_icon</th>

                    <th width="280px">Action</th>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <form method="get" action="{{url('search')}}" enctype="multipart/form-data">
                            {!! Form::text('name', null,
                                                   array('required',
                                                        'class'=>'form-control',
                                                       //  'style'=>'width:100px',
                                                        'placeholder'=>'Search for a name...')) !!}

                       </form>
                    </td>
                    <td>
                        <form method="get" action="{{url('search')}}" enctype="multipart/form-data">
                            {!! Form::text('description', null,
                                                   array('required',
                                                        'class'=>'form-control',
                                                       //  'style'=>'width:100px',
                                                        'placeholder'=>'Search for a description...')) !!}

                        </form>
                    </td>

                    <td>
                        <?php $categorys=\App\admin\Category::all(); ?>
                        <form method="get" action="{{url('search')}}" enctype="multipart/form-data" name="form2">
                            <select name="pid" onchange = "form2.submit();">
                                <option>Select Category</option>
                                <?php foreach ($categorys as $cat){?>
                                <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>

                                <?php }?>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form method="get" name="form" action="{{url('search')}}" enctype="multipart/form-data">
                              <select name="active" onchange = "form.submit();">
                                  <option>Select Option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                              </select>
                        </form>
                    </td>
                    <td>
                        <form method="get" name="form1" action="{{url('search')}}" enctype="multipart/form-data">
                            <select name="popular" onchange = "form1.submit();">
                                <option>Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </form>
                    </td>

                    <td>
                        <form method='get' enctype='multipart/form-data' id='formId' action="{{url('search')}}">
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input class="date form-control" type="text" id="date1" name="created_at" placeholder="seleact date">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </form>
                        </td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($category as $cat)

                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->description }}</td>
                        <?php   $name=DB::table('category')->select('name')->where('id','=',$cat->pid)->value('name');?>
                        <td>{{ $name }}</td>
                        <td>{{ $cat->is_active }}</td>
                        <td>{{ $cat->is_populer }}</td>
                        <td>{{ $cat->created_at }}</td>
                        <?php $image = $cat['image_icon'] ?>
                        <td><img height="200" width="200" src="{{  asset('images/'.$image ) }}"></td>

                        <td>
                            <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\CategoryController@destroy', $cat['id'])}}" method="POST">
                                <a class="btn btn-info" href="{{action('admin\CategoryController@edit', $cat['id'])}}">Edit</a>
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
@section('content1')


    @endsection
