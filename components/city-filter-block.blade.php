<section class="city">
	<div class="city-container">
		<h2 class="title text-center text-md-left">Countries and Cities</h2>
		<p class="title-flat text-center">United States</p>
	</div>
	<div class="row" id="statesContainer">
{{--		@foreach ( $cityCol as $key => $cityWrap )--}}
{{--			<div class="col-6 col-md-3" data-bragger='1'>--}}
{{--				<h3 class="state-xl">--}}
{{--					{{ $key }}--}}
{{--				</h3>--}}
{{--				@foreach( $cityWrap as $city )--}}
{{--					<a href="{{ route( 'searchFilter' , [ 'state' => $city[ 'stateUrl' ] , 'city' => $city[ 'cityUrl' ] ] ) }}"--}}
{{--							class="state-sm">--}}
{{--						{{ $city[ 'city' ] }}--}}
{{--					</a>--}}
{{--				@endforeach--}}
{{--			</div>--}}
{{--		@endforeach--}}

		<div class="col-6 col-md-3" data-bragger='1'>
			@foreach ( $cityCol[ 0 ] as $key => $cityWrap )
				<h3 class="state-xl">
					{{ $cityCol[ 0 ][ $key ][ 0 ][ 'states' ] }}
				</h3>
				@foreach( $cityWrap as $cityKey => $city )
					@if ( $cityKey < 10 )
					<a
						href="{{ route( 'searchFilter' , [ 'state' => $city[ 'stateUrl' ] , 'city' => $city[ 'cityUrl' ] ] ) }}"
						class="state-sm">
						{{ $city[ 'city' ] }}
					</a>
					@endif
				@endforeach
			@endforeach
		</div>
		<div class="col-6 col-md-3" data-bragger='2'>
			@if(isset($cityCol[ 1 ]))
				@foreach ( $cityCol[ 1 ] as $key => $cityWrap )
					<h3 class="state-xl">
						{{ $cityCol[ 1 ][ $key ][ 0 ][ 'states' ] }}
					</h3>
					@foreach( $cityWrap as $cityKey => $city )
						@if ( $cityKey < 10 )
						<a
							href="{{ route( 'searchFilter' , [ 'state' => $city[ 'stateUrl' ] , 'city' => $city[ 'cityUrl' ] ] ) }}"
							class="state-sm">
							{{ $city[ 'city' ] }}
						</a>
						@endif
					@endforeach
				@endforeach
			@endif
		</div>
		<div class="col-6 col-md-3" data-bragger='3'>
			@if(isset($cityCol[ 2 ]))
				@foreach ( $cityCol[ 2 ] as $key => $cityWrap )
					<h3 class="state-xl">
						{{ $cityCol[ 2 ][ $key ][ 0 ][ 'states' ] }}
					</h3>
					@foreach( $cityWrap as $cityKey => $city )
						@if ( $cityKey < 10 )
						<a
							href="{{ route( 'searchFilter' , [ 'state' => $city[ 'stateUrl' ] , 'city' => $city[ 'cityUrl' ] ] ) }}"
							class="state-sm">
							{{ $city[ 'city' ] }}
						</a>
						@endif
					@endforeach
				@endforeach
			@endif
		</div>
		<div class="col-6 col-md-3" data-bragger='4'>
			@if(isset($cityCol[ 3 ]))
				@foreach ( $cityCol[ 3 ] as $key => $cityWrap )
					<h3 class="state-xl">
						{{ $cityCol[ 3 ][ $key ][ 0 ][ 'states' ] }}
					</h3>
					@foreach( $cityWrap as $cityKey => $city )
						@if ( $cityKey < 10 )
						<a
							href="{{ route( 'searchFilter' , [ 'state' => $city[ 'stateUrl' ] , 'city' => $city[ 'cityUrl' ] ] ) }}"
							class="state-sm">
							{{ $city[ 'city' ] }}
						</a>
						@endif
					@endforeach
				@endforeach
			@endif
		</div>
	</div>
{{--	<button type="button" class="d-flex mx-auto btn btn-main btn-load mt-3" id="loadStates" data-ids="{{ implode(',', $citiesIds) }}">--}}
{{--		<img src="/img/icon/Refresh.svg" class="mr-2" alt="">--}}
{{--		Load more--}}
{{--	</button>--}}
</section>