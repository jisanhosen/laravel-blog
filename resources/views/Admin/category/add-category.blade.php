@extends('Admin.master')
@section('title')
    Add Category
@endsection
@section('contant')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr/>
            <div class="well">
                @if($message = Session::get('message'))
                    <hr/>
                    <h1 class="text-center text-success">{{ $message }}</h1>
                @endif
                <form class="form-horizontal" action="{{ url('/category/new') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                        </div>
                    </div><div class="form-group">
                        <label class="control-label col-sm-3">Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description" style="resize: vertical"></textarea>
                            <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="publication_status">
                                <option value="0">---Select Publication Status---</option>
                                <option value="1">---Published---</option>
                                <option value="0">---Unpublished---</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection