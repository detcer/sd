@extends('admin.page.editor');


@section('textarea')
    <form method="POST" action="{{ route('admin.update.page') }}" id="state">
        {{ csrf_field() }}
        <input type="hidden" name="pageName" value="{{$page->pageName}}">
        <input type="hidden" name="pageId" value="{{$page->id}}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="usr">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$page->title}}" required>
                </div>
                <div class="form-group">
                    <label for="usr">Description:</label>
                    <input type="text" class="form-control" name="description" value="{{$page->description}}" required>
                </div>
                <div class="form-group">
                    <label for="usr">H1:</label>
                    <input type="text" class="form-control" name="h1" value="{{$page->h1}}">
                </div>
                <div class="form-group">
                    <strong>Page:</strong>
                    <textarea class="form-control summernote" id="editorArea" name="content" required>{{$page->content}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>

@endsection;

