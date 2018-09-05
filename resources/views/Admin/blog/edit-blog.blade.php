@extends('Admin.master')
@section('title')
    Add Blog
@endsection
@section('contant')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr/>
            <div class="well">
                <form name="editBlogForm" class="form-horizontal" action="{{ url('/blog/update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Blog Title</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="blog_title" value="{{ $blogById->blog_title }}"/>
                            <input class="form-control" type="hidden" name="blog_id" value="{{ $blogById->id }}"/>
                            <span class="text-danger">{{ $errors->has('blog_title') ? $errors->first('blog_title') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                                <option>--Select Category--</option>
                                @foreach( $publishedcategories as $publishedcategory )
                                    <option value="{{ $publishedcategory->id }}">{{ $publishedcategory->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Blog Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="blog_description">{{ $blogById->blog_description }}</textarea>
                            <span class="text-danger">{{ $errors->has('blog_description') ? $errors->first('blog_description') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Blog Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="blog_image" accept="image/*"/>
                            <img src="{{ asset($blogById->blog_image) }}" alt="{{ $blogById->blog_title }}" style="width:70px; height:50px">
                            <span class="text-danger">{{ $errors->has('blog_image') ? $errors->first('blog_image') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="publication_status">
                                <option>---Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="0">UnPublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input class="btn btn-success btn-block" type="submit" name="btn" value="Update Blog Information"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editBlogForm'].elements['category_id'].value = '{{ $blogById->category_id }}';
        document.forms['editBlogForm'].elements['publication_status'].value = '{{ $blogById->publication_status }}';
    </script>
@endsection