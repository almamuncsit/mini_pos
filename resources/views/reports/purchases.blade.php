@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-4">
			<h2> Purchases Report </h2>		
		</div>
		<div class="col-md-8 text-right">
			{!! Form::open([ 'route' => ['reports.purchases'], 'method' => 'get' ]) !!}
			<div class="form-row align-items-center">
			    <div class="col-auto">
			      	<label class="sr-only" for="inlineFormInput">Start Date</label>
			      	{{ Form::date('start_date', $start_date, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Start Date' ]) }}
			    </div>
			    <div class="col-auto">
			      	<label class="sr-only" for="inlineFormInputGroup">End Date</label>
			      	<div class="input-group mb-2">
			        	{{ Form::date('end_date', $end_date, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'End Date' ]) }}
			      	</div>
			    </div>			    
			    <div class="col-auto">
			      	<button type="submit" class="btn btn-primary mb-2">Submit</button>
			    </div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">Purchases Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-striped table-borderless table-sm" cellspacing="0">
	          <thead>
	            <tr>
	            	<th>Date</th>
	              	<th>Products</th>
	              	<th class="text-right d-none d-sm-table-cell">Quantity</th>
	              	<th class="text-right d-none d-sm-table-cell">Price</th>
	              	<th class="text-right">Total</th>
	            </tr>
	          </thead>
	          
	          <tbody>
	          	@foreach ($purchases as $purchase)
		            <tr>
		            	<td> {{ $purchase->date }} </td>
			            <td> {{ $purchase->title }} </td>
			            <td class="text-right d-none d-sm-table-cell"> {{ $purchase->quantity }} </td>
			            <td class="text-right d-none d-sm-table-cell"> {{ $purchase->price }} </td>
			            <td class="text-right"> {{ $purchase->total }} </td>
		            </tr>
	            @endforeach
	          </tbody>

	          <tfoot>
	            <tr>
	            	<th></th>
	              	<th class="text-right d-none d-sm-table-cell">Ttoal Items:</th>
	              	<th class="text-right d-none d-sm-table-cell"> {{ $purchases->sum('quantity') }} </th>
	              	<th class="text-right">Total:</th>
	              	<th class="text-right"> {{ $purchases->sum('total') }} </th>
	            </tr>
	          </tfoot>

	        </table>
	      </div>
	    </div>
	  </div>


@stop
