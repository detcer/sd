@extends( 'layouts.public', ['index' => count($models) >= 1 ? true : false ] )
@section ( "styles" )
    <link href="{{ asset( 'category.css?v=13' ) }}" rel="stylesheet">
@endsection

@section( 'content' )
    <div class="info text-center text-md-left">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
		<div class="container">

		
		<div class="contaiener-box">
			<h1 class="info-big-title"><strong>{{$service->name}}</strong></h1>
</div>

	 <ol class="breadcrumb mb-2" itemscope="" itemtype="https://schema.org/BreadcrumbList">
			<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			  <a itemtype="https://schema.org/Thing" itemprop="item" href="{{url('')}}">
				<span itemprop="name" style="color: #212529">Home</span></a>
				<span class="after"></span>
			   <meta itemprop="position" content="1" />
			</li>
			 <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			  <a itemtype="https://schema.org/Thing" itemprop="item" href="{{route('services')}}">
				<span itemprop="name" style="color: #212529">Services</span></a>
				<span class="after"></span>
			   <meta itemprop="position" content="2" />
			</li>
			  <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<span itemprop="name" style="color: #212529">{{$service->name}}</span>
		
				  <meta itemprop="position" content="3" />
			</li>
		 </ol>
		</div>
        @include( 'components/bs-select-filter', ['serviceSelected' => $service->name_id, 'serviceName' => $service->name] )
			
			<div data-aos="zoom-in">
        <section class="worker-girls">
        <div class="container">
            <div class="row">
			@foreach($models as $items => $model)
				 @include( 'partials.category-model' , $model )
				@endforeach
            </div>
        </div>
			
			
    </section>
	<div class="container  mt-5">
	 @php
		 $limit = 5;
	 
	 @endphp
		
	@if($totalPages > 1)
		@php
			$counter = 1;
		@endphp
		 <ul class="pagination">
			 @if ($page > 1)
				 <li><a href="?page=1">1</a></li>
				 <li>.. </li>

			 @endif
		 	@for($i = $page; $i <= $totalPages; $i++)
				@if($counter < $limit)
				 	<li><a href="?page={{$i}}"><span class="@if($page == $i) active @endif">{{$i}}</span></a></li>
				 	@php
						$counter++;
				 	@endphp
			 	@endif
			@endfor

			 @if ($page < $totalPages - ($limit/2))
					 <li>... </li>
				 <li><a href="?page={{$totalPages}}">{{$totalPages}}</a> </li>
			 @endif

		</ul>
	@endif

	@if($page == 1)
    <div class="contaiener-box mt-5">
        {!! $service->extra_text !!}
    </div>
@endif
	
	{{-- 
		<div class="contaiener-box mt-5">
			{!! $service->extra_text !!}
			</div>
			--}}
        </div>
	</div>

		<div class="container">
		<section class="city">
	<div class="city-container">
		<h2 class="title text-center text-md-left">Countries and Cities</h2>
		<p class="title-flat text-center">United States</p>
	</div>
	<div class="row" >
		@foreach($cityCol as $entry => $states)
			@foreach($states as $state)
			<div class="col-6 col-md-3" >
				<p class="state-xl">{{$state['name']}} </p>
				@foreach($state['cities'] as $city)
					<a
							href="{{ route( 'state-city-filter' , [ 'state' => $state[ 'stateUrl' ] , 'city' => $city[ 'cityUrl' ], 'service' => $service->name_id ] ) }}"
							class="state-sm">
						{{ $city[ 'name' ] }}
					</a>
					@endforeach
			</div>
			@endforeach
		@endforeach
			
			
	</div>
</section>
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
	
