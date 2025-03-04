<div class="container mb-md-5">
	<form method="POST" action="{{ route( 'search' ) }}">
	@csrf
	<div class="d-flex justify-content-lg-between justify-content-center align-items-center flex-lg-row flex-column">

		<div class="mb-3 mb-lg-0 h5">
			<p class="text-bold mb-lg-0">
				Select your location:
			</p>
		</div>
		<div class="mb-4 mb-lg-0">
			<select name="state" required="" title="State"  class="selectpicker {{isset($serviceSelected) ? 'full' : ''}}" data-live-search="true" id="selectState" tabindex="-98">
{{--				@include( 'components.states-shitcode' )--}}
				<option class="bs-title-option" value="" disabled="" style="height: 2px;"></option>
				@foreach( $states as $state )
					<option value="{{ $state['id'] }}">{{ $state['title'] }}</option>
				@endforeach
			</select>
		</div>
		<div class="mb-4 mb-lg-0">
			<select name="city" required title="City" size="5" class="selectpicker {{isset($serviceSelected) ? 'full' : ''}}" data-live-search="true" id="selectCity" data-selected-text-format="count"></select>
		</div>

		@if(!isset($serviceSelected))
		<div class="mb-4 mb-lg-0">
			<select name="services[]" required title="Services" multiple size="5" class="selectpicker" id="selectServices" data-live-search="true" data-selected-text-format="count">
{{--				@foreach ( $services as $item )--}}
{{--					<option value="{{ $item -> name_id }}">--}}
{{--						{{ $item -> name }}--}}
{{--					</option>--}}
{{--				@endforeach;--}}
			</select>
		</div>
		@else
			<input name="services[]" type="hidden" value="{{$serviceSelected}}">
		@endif
		<div class="mb-4 mb-lg-0">
			<button class="btn btn-main" type="submit">Select</button>
		</div>
	</div>
	</form>
</div>