@extends('layouts.app')


@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Prodcut</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div>
            <h4>Date range</h4>
            <form method="get" action="{{url('productsearch')}}" enctype="multipart/form-data">
                <input type="text" class="daterange" name="range"/>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h2>List Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success"  href="{{ url('product/create') }}"> Add product</a>
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
                <th>Category</th>
                <th>Is_active</th>
                <th>Is_Populer</th>
                <th>Created date</th>
                <th>image_icon</th>

                <th width="280px">Action</th>
            </tr>
            <tr>
                <td></td>
                <td>
                    <form method="get" action="{{url('productsearch')}}" enctype="multipart/form-data">
                        {!! Form::text('title', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for a name...')) !!}

                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('productsearch')}}" enctype="multipart/form-data">
                        {!! Form::text('description', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                   //  'style'=>'width:100px',
                                                    'placeholder'=>'Search for a description...')) !!}

                    </form>
                </td>
                <td>
                    <?php $category=DB::table('category')->where('pid','<>', '0')->get(); ?>
                    <form method="get" action="{{url('productsearch')}}" enctype="multipart/form-data" name="form2">
                        <select name="category" onchange = "form2.submit();">
                            <option>Select Category</option>
                        <?php foreach ($category as $cat){?>
                            <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>

                        <?php }?>
                        </select>
                    </form>
                </td>
                <td>
                    <form method="get" name="form" action="{{url('productsearch')}}" enctype="multipart/form-data">
                        <select name="active" onchange = "form.submit();">
                            <option>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form method="get" name="form1" action="{{url('productsearch')}}" enctype="multipart/form-data">
                        <select name="popular" onchange = "form1.submit();">
                            <option>Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </form>
                </td>

                <td>
                    <form method='get' enctype='multipart/form-data' id='formId' action="{{url('productsearch')}}">
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
            </tr>
            @foreach ($products as $product)

                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                    <?php

                    $parent= \App\admin\CategoryProduct::select('*')->where(['product_id'=>$product->id])->get();

                    foreach ($parent as $p){
                        $name=DB::table('category')->select('name')->where('id','=',$p->category_id)->value('name');
                        ?>
                    {{ $name }}
                        <br>
                    <?php
                    }
                    ?>
                    </td>


                    <td>{{ $product->is_active }}</td>
                    <td>{{ $product->is_populer }}</td>
                    <td>{{ $product->created_at }}</td>
                    <?php $image = $product['cover_image'] ?>

                    <td><img height="200" width="200" src="{{  asset('images/'.$image ) }}"></td>

                    <td>
                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\ProductController@destroy', $product['id'])}}" method="POST">
                            <a class="btn btn-info" href="{{action('admin\ProductController@edit', $product['id'])}}">Edit</a>
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

