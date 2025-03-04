@extends( 'admin.category.layout' );


@section( 'table' )
    <form class="form" method="POST" action="{{ route( 'admin.categories.store' ) }}">
        @csrf
        @if ( $errors -> any() )
            @foreach ( $errors -> all() as $err )
                <div class="alert alert-danger">{{ $err }}</div>
            @endforeach
        @endif
        <div class="form-group">
            <label class="">Название</label>
            <input minlength="4" maxlength="100" value="{{ old( 'title' ) }}" type="text" name="title" class="form-control" required="" autofocus="" />
        </div>
        <div class="form-group">
            <label class="">Чпу</label>
            <input minlength="4" maxlength="80" value="{{ old( 'slug' ) }}" type="text" name="slug" class="form-control" />
        </div>
        <div class="form-group">
            <label class="">Описание</label>
            <textarea name="description" minlength="15" maxlength="200" class="form-control" required="">{{ old( 'description' ) }}</textarea>
        </div>
        <div class="form-group">
            <select name="parent_id" class="form-control">
                <option selected="" value="0">Категория первого уровня</option>
                @foreach ( $categories as $cat )
                    <option value="{{ $cat -> id }}">{{ $cat -> title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Save</button>
        </div>
    </form>
@endsection;
