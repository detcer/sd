@extends('admin.page.filter.editor');


@section('textarea')
    <form method="POST" action="{{ route('admin.update.page.state') }}" id="state">
        {{ csrf_field() }}
        <input type="hidden" name="pageName" value="{{$page->pageName}}">
        <input type="hidden" name="pageId" value="{{$page->id}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="usr">Title:</label>
                <input type="text" class="form-control" name="title" value="{{$page->title}}">
            </div>
            <div class="form-group">
                <label for="usr">H1:</label>
                <input type="text" class="form-control" name="h1" value="{{$page->h1}}">
            </div>
            <div class="form-group">
                <label for="usr">Description:</label>
                <input type="text" class="form-control" name="description" value="{{$page->description}}">
            </div>
            <div class="form-group">
                <strong>Page:</strong>
                <textarea class="form-control summernote" id="editorArea" name="content">{{$page->content}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection;



@section('textarea2')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <textarea  form="state" class="form-control summernote" id="editorArea2" name="content_bottom">{{$page->content_bottom}}</textarea>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button form="state" type="submit" class="btn btn-primary">Submit</button>
    </div>

@endsection;
