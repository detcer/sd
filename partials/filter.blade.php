<div id='filter-block'>
	<button class="btn btn-primary" id="filter-toggle"><i class="fa fa-filter fa-2x"></i></button>
	<div class="row">
		<div class="col py-md-5 py-3 my-md-5 px-5 px-md-3">
			<form class="form" method="GET" action="{{ route( 'filter' ) }}">



				<div class="">
					<div class="" id="headingOne">
					  <h5 class="mb-0">
					    <button type='button' class="btn btn-light btn-transparent btn-block " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					      	<span class="float-left">Category</span>
					      	<span class="float-right">
						    	<i class="fa fa-angle-down angle-down"></i>
						    	<i class="fa fa-angle-up angle-up"></i>
					      	</span>
					    </button>
					  </h5>
					</div>

					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
					  <div class="card-body">
					  	<div>
					  		<select name="category_id" class="form-control">
				  				<option value="">No Category</option>
					  			@foreach ( $cats as $cat )
					  				<option value="{{ $cat -> id }}">{{ $cat -> title }}</option>
					  			@endforeach
					  		</select>
					  	</div>
					  </div>
					</div>
					</div>



					<div class="">
					<div class="" id="headingTwo">
					  <h5 class="mb-0">
					    <button type='button' class="btn btn-light btn-transparent btn-block " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					      	<span class="float-left">FPS</span>
					      	<span class="float-right">
						    	<i class="fa fa-angle-down angle-down"></i>
						    	<i class="fa fa-angle-up angle-up"></i>
					      	</span>
					    </button>
					  </h5>
					</div>
					<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
					  <div class="card-body">
					  	<div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-light">
						    <input type="radio" name="options" id="option1" autocomplete="off"> 23.98
						  </label>
						  <label class="btn btn-light">
						    <input type="radio" name="options" id="option2" autocomplete="off"> 25
						  </label>
						</div>

					  </div>
					</div>
					</div>

					<div class="">
					<div class="" id="headingThree">
					  <h5 class="mb-0">
					    <button type='button' class="btn btn-light btn-transparent btn-block " data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
					      	<span class="float-left">People</span>
					      	<span class="float-right">
						    	<i class="fa fa-angle-down angle-down"></i>
						    	<i class="fa fa-angle-up angle-up"></i>
					      	</span>
					    </button>
					  </h5>
					</div>
					<div id="collapseThree" class="collapse show" aria-labelledby="headingThree">
					  <div class="card-body">
					  	<div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-light">
						    <input type="radio" name="options" id="option1" autocomplete="off"> With people
						  </label>
						  <label class="btn btn-light">
						    <input type="radio" name="options" id="option1" autocomplete="off"> Without people
						  </label>
						</div>

					  </div>
					</div>
					</div>




					<div class="">
					<div class="" id="headingFour">
					  <h5 class="mb-0">
					    <button type='button' class="btn btn-light btn-transparent btn-block " data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
					      	<span class="float-left">Usage</span>
					      	<span class="float-right">
						    	<i class="fa fa-angle-down angle-down"></i>
						    	<i class="fa fa-angle-up angle-up"></i>
					      	</span>
					    </button>
					  </h5>
					</div>
					<div id="collapseFour" class="collapse show" aria-labelledby="headingFour">
					  <div class="card-body">
					  	<div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-light">
						    <input type="radio" name="options" id="option1" autocomplete="off"> Only Editorial
						  </label>
						</div>

					  </div>
					</div>
					</div>




					<div class="">
					<div class="" id="headingFive">
					  <h5 class="mb-0">
					    <button type='button' class="btn btn-light btn-transparent btn-block " data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
					      	<span class="float-left">Author</span>
					      	<span class="float-right">
						    	<i class="fa fa-angle-down angle-down"></i>
						    	<i class="fa fa-angle-up angle-up"></i>
					      	</span>
					    </button>
					  </h5>
					</div>
					<div id="collapseFive" class="collapse show" aria-labelledby="headingFive">
					  <div class="card-body">
					  	<div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-light">
						    <input type="radio" name="options" id="option1" autocomplete="off"> Allan Dobrovski
						  </label>
						</div>

					  </div>
					</div>
					</div>

					<!-- <div>
						<button type="submit" class="btn btn-primary btn-block">Filter</button>
					</div> -->

					<div>
						<button type="reset" class="btn btn-primary btn-block">Reset all filters</button>
					</div>


				</form>
		</div>
	</div>
</div>
