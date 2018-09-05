@extends('Admin.master')
@section('title')
    Edit Category
@endsection
@section('contant')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <hr/>
            <div class="well">
                <form name="edit-form" class="form-horizontal" action="{{ url('/category/update') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control" value="{{ $categoryById->category_name }}" required/>
                            <input type="hidden" name="category_id" class="form-control" value="{{ $categoryById->id }}" required/>
                            <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                        </div>
                    </div><div class="form-group">
                        <label class="control-label col-sm-3">Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description" style="resize: vertical" required>{{ $categoryById->category_description }}</textarea>
                            <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="publication_status">
                                <option>---Select Publication Status---</option>
                                <option value="1">---Published---</option>
                                <option value="0">---Unpublished---</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['edit-form'].elements['publication_status'].value= '{{ $categoryById->publication_status }}';
    </script>
@endsection