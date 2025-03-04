
<style type="text/css">
	@media only screen and (min-width: 768px) {
		#xxx {
			display: none;
		}
	}
	@media only screen and (max-width: 768px) {
		#statesContainer , #loadStates {
			display: none!important;
		}
		#xxx .cities ul {
			display: none;
		}
		#xxx .active-cities ul {
			display: block;
		}
		#xxx .cities .fa-minus-square-o {
			display: none;
		}
		#xxx .active-cities .fa-minus-square-o {
			display: inline-block;
		}
		#xxx .cities .fa-plus-square-o {
			display: inline-block;
		}
		#xxx .active-cities .fa-plus-square-o {
			display: none;
		}
		#xxx {
			text-align: left;
			font-size: 16px;
			display: block;
			color: #333;
		}
		#xxx ul {
			list-style: none;
			padding-left: 0;
		}
		#xxx .borderr {
			border-bottom: 1px solid #dbe1e8;
			padding: 5px;
		}
		#xxx li {
			color: #333;
			font-weight: bold;
		}
		#xxx li:hover {
			cursor: pointer;
		}
		#xxx a {
			color: #333;
			text-decoration: none;
			font-weight: normal;
		}
		#xxx a:hover {
			color: #0056b3;
			cursor: pointer;
		}
		#xxx i {
			position: absolute;
			right: 15px;
			margin-top: 5px;
		}
		.rel {
			position: relative;
		}
	}
</style>
<div class="container" id="xxx">
	<ul class="rel">
		@foreach( $statesMobile as $stateMobile )
			@if ($stateMobile[ 'total' ])
				<li class="cities">
					<div class="borderr toggleCities">
						<span>{{ $stateMobile[ 'title' ] }}</span>
						<i class="fa fa-plus-square-o"></i>
						<i class="fa fa-minus-square-o"></i>
					</div>
					<ul class="">
						@foreach( $stateMobile[ 'cities' ] as $city )
							<li class="borderr pl-3">
								<a href="https://secretdesire.co/{{ $stateMobile[ 'slug' ] }}-{{ $city[ 'slug' ] }}">{{ $city[ 'title' ] }}</a>
							</li>
						@endforeach
					</ul>
				</li>
			@endif
		@endforeach
	</ul>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script type="text/javascript">
	$( "#xxx .toggleCities" ).on( 'click' , function() {
		let opened = 5;  // opoened popoxakany false a
		if ( $( this ).closest( 'li' ).hasClass( 'active-cities' ) ) {  // ete bacvac er sarqumenq opened popoxakan@ true
			opened = 5.5;
		}
		$( '#xxx .cities' ).removeClass( 'active-cities' ); // saxin pakum enq
		if ( opened == 5 ) { // stugum enq , opoened popoxakan@ false a te tru
			$( this ).closest( 'li' ).addClass( 'active-cities' ); // u ete false - a , ira motiny bacum enq
		}
	});
</script>