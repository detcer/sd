@extends( 'admin.category.layout' );


@section( 'table' )
    <form class="form" method="POST" action="{{ route( 'admin.categories.update' , $category -> id ) }}">
        @csrf
        @method( 'PUT' )
        @if ( $errors -> any() )
            @foreach ( $errors -> all() as $err )
                <div class="alert alert-danger">{{ $err }}</div>
            @endforeach
        @endif
        <input type="hidden" value="{{ $category -> id }}" name="id" />
        <div class="form-group">
            <label class="">Название</label>
            <input minlength="4" maxlength="100" value="{{ $category -> title }}" type="text" name="title" class="form-control" required="" autofocus="" />
        </div>
        <div class="form-group">
            <label class="">Чпу</label>
            <input minlength="4" maxlength="80" value="{{ $category -> slug }}" type="text" name="slug" class="form-control" />
        </div>
        <div class="form-group">
            <label class="">Описание</label>
            <textarea name="description" minlength="15" maxlength="200" class="form-control" required="">{{ $category -> description }}</textarea>
        </div>
        <div class="form-group">
            <select name="parent_id" class="form-control">
                <option {{ $category -> parent_id == 0 ? 'selected' : '' }} value="0">Категория первого уровня</option>
                @foreach ( $categories as $cat )
                    <option {{ $category -> parent_id == $cat -> id ? 'selected' : '' }} value="{{ $cat -> id }}">{{ $cat -> title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Save</button>
        </div>
    </form>
@endsection;
