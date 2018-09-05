@extends('Admin.master')
@section('title')
    Manage Category
@endsection
@section('contant')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <hr/>
                @if($message = Session::get('message'))
                    <h1 class="text-success text-center">{{ $message }}</h1>
                    <hr/>
                @endif
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-primary btn-xs" title="Edit_Category">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ url('/category/delete/'.$category->id) }}" class="btn btn-danger btn-xs" title="Delete_Category" onclick="return confirm('Are you sure delete this')">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection