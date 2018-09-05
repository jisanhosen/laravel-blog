@extends('Admin.master')

@section('title')
    View Blog
@endsection

@section('contant')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr/>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Blog Id</th>
                            <td>{{ $blogById->id }}</td>
                        </tr>
                        <tr>
                            <th>Blog Title</th>
                            <td>{{ $blogById->blog_title }}</td>
                        </tr>
                        <tr>
                            <th>Category Id</th>
                            <td>{{ $blogById->category_id }}</td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $blogById->category_name }}</td>
                        </tr>
                        <tr>
                            <th>Blog Description</th>
                            <td>{{ $blogById->blog_description }}</td>
                        </tr>
                        <tr>
                            <th>Blog Image</th>
                            <td><img src="{{ asset($blogById->blog_image) }}" alt="{{ $blogById->blog_title }}" style="width:150px; height:100px"/></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{ $blogById->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection