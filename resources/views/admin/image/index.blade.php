@extends('layouts.app')


@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Image</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Image</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">




        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>ProductId</th>
                <th>Image</th>
                <th width="280px">Action</th>
            </tr>


            @foreach ($images as $img)

                <tr>
                    <td>{{  $img->id  }}</td>
                    <td>{{ $img->product_id }}</td>
                    <td>{{ $img->image }}</td>

                    <?php $image = $img['image'] ?>
                    <td><img height="200" width="200" src="{{  asset('images/'.$image ) }}"></td>
                    <td>
                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{action('admin\ImageController@destroy', $img['id'])}}" method="POST">

                          <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="submit" value="Delete" class="btn btn-danger" >
                        </form>
                    </td>
                </tr>

            @endforeach

        </table>
            <form method="post" action="{{action('admin\ImageController@update', 12)}}"  enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="productimage">ProdutImage:</label>

                        <input required type="file" class="form-control" name="images[]"  multiple>
                        <div class="form-group col-md-4" style="margin-top:60px">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        {{--<input type="file" name="coverImage">--}}
                    </div>
                </div>
            </form>

        {{-- {!! $category->links() !!}--}}

    </div>

@endsection

