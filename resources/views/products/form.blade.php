@extends('layout.main')

@section('main_content')

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	
	<h2> {{ $headline }} </h2>
	
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
	    </div>
	    <div class="card-body">
	    	<div class="row justify-content-md-center">
	    		<div class="col-md-12">
	    			@if($mode == 'edit')
	    				{!! Form::model($product, [ 'route' => ['products.update', $product->id], 'method' => 'put' ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'products.store', 'method' => 'post' ]) !!}	
	    			@endif

					  <div class="form-group row">
					    <label for="title" class="col-sm-2 text-right col-form-label">Title <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      {{ Form::text('title', NULL, [ 'class'=>'form-control', 'id' => 'title', 'placeholder' => 'Title' ]) }}
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="description" class="col-sm-2 text-right col-form-label">Description <span class="text-danger">*</span>  </label>
					    <div class="col-sm-9">
					      {{ Form::textarea('description', NULL, [ 'class'=>'form-control', 'id' => 'description', 'placeholder' => 'Description' ]) }}
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="name" class="col-sm-2 text-right col-form-label">Category <span class="text-danger">*</span> </label>
					    <div class="col-sm-5">
					      {{ Form::select('category_id', $categories, NULL, [ 'class'=>'form-control', 'id' => 'group', 'placeholder' => 'Select Category' ]) }}
					    </div>
					  </div>
					  
					  <div class="form-group row">
					    <label for="cost_price" class="col-sm-2 text-right col-form-label">Cost Price</label>
					    <div class="col-sm-5">
					      {{ Form::text('cost_price', NULL, [ 'class'=>'form-control', 'id' => 'cost_price', 'placeholder' => 'Cost Price' ]) }}
					    </div>
					  </div>
					  
					  <div class="form-group row">
					    <label for="price" class="col-sm-2 text-right col-form-label">Sale Price</label>
					    <div class="col-sm-5">
					      {{ Form::text('price', NULL, [ 'class'=>'form-control', 'id' => 'price', 'placeholder' => 'Sale Price' ]) }}
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="name" class="col-sm-2 text-right col-form-label">Has Stock </label>
					    <div class="col-sm-2">
					      {{ Form::select('has_stock', [ '1'=> 'Yes', '0' => "No" ], NULL, [ 'class'=>'form-control', 'id' => 'group' ]) }}
					    </div>
					  </div>

					  <div class="form-group row mt-4">
					    <label for="price" class="col-sm-2 text-right col-form-label"></label>
					    <div class="col-sm-5">
					      <button type="submit" class="btn btn-primary btn-lg"> <i class="fa fa-save"></i> Submit</button>	
					    </div>
					  </div>
					  
					{!! Form::close() !!}
	    		</div>
	    	</div>
	    </div>
	</div>
@stop
