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
                    <th>image_icon</th>
                    <th width="280px">Action</th>
                </tr>


                @foreach ($category as $cat)

                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->description }}</td>
                     {{--   $user = DB::table('category')->where('id', $cat['pid'] )->first()
                     --}}
                        @inject('catename','App\admin\Category')
                        <td>{{$catename->select('name')->where('id','=',$cat->pid)->get()}}</td>
                        {{--<td>{{ $cat->pid }}</td>--}}
                        <td>{{ $cat->is_active }}</td>
                        <td>{{ $cat->is_populer }}</td>
                        <?php $image = $cat['image_icon'] ?>
                        <td><img height="200" width="200" src="{{  asset('images/'.$image ) }}"></td>

                        <td>
                            <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\CategoryController@destroy', $cat['id'])}}" method="POST">


                             {{--   <a class="btn btn-info" href="">Show</a>
--}}

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

