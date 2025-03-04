
<option class="bs-title-option" value="" disabled="" style="height: 2px;"></option>
@foreach( $statez as $state )
	<option value="{{ $state -> id }}">{{ $state -> title }}</option>
@endforeach