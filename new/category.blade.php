@extends( 'layouts.public' )
@section( 'content' )
<div class="container">
	<h1 class="text-center">{{ $category -> title }}</h1>
	<p>
		{{ $category -> description }}
	</p>
</div>
@endsection