@extends( 'layouts.public' , ['index' => false] )
@section( 'content' )
<div class="container">
	@if (isset($page))
		<h1 style="text-align: center; margin-bottom: 7.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span lang="EN-US" style="">{{ $page->h1 }}</span></h1>
	@endif

	{!! $content -> content !!}
</div>
@endsection