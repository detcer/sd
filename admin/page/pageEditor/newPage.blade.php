@extends('admin.page.newPage');


@section('page')

    <form method="POST" action="{{ route('admin.page.save.newPage') }}" id="state">
        {{ csrf_field() }}
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <label for="usr">Page name:</label>
                <input type="text" class="form-control" name="pageName" required>
            </div>

            <div class="form-group">
                <label for="usr">Title:</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="usr">Description:</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="usr">H1:</label>
                <input type="text" class="form-control" name="h1">
            </div>
            <div class="form-group">
                <strong>Page:</strong>
                <textarea class="form-control summernote" id="editorArea" name="content" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection;

