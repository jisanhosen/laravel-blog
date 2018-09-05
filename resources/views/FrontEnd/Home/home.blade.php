@extends('FrontEnd.master')

@section('title')
    Home
@endsection

@section('body')
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-3">A Warm Welcome!</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
        </header>

        <!-- Page Features -->
        <div class="row text-center">
            @foreach($publishedBlogs as $publishedBlog)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($publishedBlog->blog_image) }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $publishedBlog->blog_title }}</h4>
                        <p class="card-text">{{ $publishedBlog->blog_description }}.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">{{ $publishedBlog->category_name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->

    </div>
@endsection