@extends('Admin.master')
@section('title')
    Manage Blog
@endsection
@section('contant')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr/>
            @if($message = Session::get('message'))
                <h1 class="text-success text-center">{{ $message }}</h1>
                <hr/>
            @endif
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Blog Id</th>
                    <th>Blog Title</th>
                    <th>Category Id</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                @foreach($blogdetails as $blogdetail)
                    <tr>
                        <td>{{ $blogdetail->id }}</td>
                        <td>{{ $blogdetail->blog_title }}</td>
                        <td>{{ $blogdetail->category_name }}</td>
                        <td>{{ $blogdetail->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            <a href="{{ url('/blog/view/'.$blogdetail->id) }}" class="btn btn-info btn-xs" title="View_Blog_Details">
                                <span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
                            @if($blogdetail->publication_status == 1)
                            <a href="{{ url('/blog/unpublished/'.$blogdetail->id) }}" class="btn btn-success btn-xs" title="Published_Blog">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                            </a>
                            @else
                            <a href="{{ url('/blog/published/'.$blogdetail->id) }}" class="btn btn-warning btn-xs" title="Published_Blog">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                            </a>
                            @endif
                            <a href="{{ url('/blog/edit/'.$blogdetail->id) }}" class="btn btn-primary btn-xs" title="Edit_Blog">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ url('/blog/delete/'.$blogdetail->id) }}" class="btn btn-danger btn-xs" title="Delete_Blog" onclick="return confirm('Are you sure delete this')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection