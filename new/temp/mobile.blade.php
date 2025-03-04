@extends( 'layouts.public' )
@section( 'content' )
<div class="info text-center text-md-left">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	<div class="container">
	</div>
	<div class="container">
		@include( 'components/city-filter-block-mobile' )
	</div>
</div>
@endsection

@agent()
@else
@section ( "scripts" )
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endsection
@endagent
@section ( "styles-footer" )
<link href="{{ asset( 'new-index.css' ) }}" rel="stylesheet">
@endsection