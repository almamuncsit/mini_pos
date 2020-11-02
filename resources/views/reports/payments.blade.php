@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-4">
			<h2> Payments Report </h2>		
		</div>
		<div class="col-md-8 text-right">
			{!! Form::open([ 'route' => ['reports.payments'], 'method' => 'get' ]) !!}
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
	      <h6 class="m-0 font-weight-bold">Payments Report <br/> <strong>{{ $start_date }}</strong> - <strong>{{ $end_date }}</strong> </h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-striped table-borderless table-sm" cellspacing="0">
	          <thead>
	            <tr>
	            	<th>Date</th>
	              	<th>User</th>
	              	<th class="text-right">Amount</th>
	            </tr>
	          </thead>
	          
	          <tbody>
	          	@foreach ($payments as $payment)
		            <tr>
		            	<td> {{ $payment->date }} </td>
			            <td> {{ optional($payment->user)->name }} </td>
			            <td class="text-right"> {{ $payment->amount }} </td>
		            </tr>
	            @endforeach
	          </tbody>

	          <tfoot>
	            <tr>
	              	<th colspan="2" class="text-right">Total:</th>
	              	<th class="text-right"> {{ $payments->sum('amount') }} </th>
	            </tr>
	          </tfoot>

	        </table>
	      </div>
	    </div>
	  </div>


@stop
