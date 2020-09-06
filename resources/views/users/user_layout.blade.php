@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-4">
			<a class="btn btn-info" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
		</div>	
		<div class="col-md-8 text-right">
			<a class="btn btn-info" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New Sale </a>
			
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
			  <i class="fa fa-plus"></i> New Purchase
			</button>
			
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
			  <i class="fa fa-plus"></i> New Payment
			</button>

			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
			  <i class="fa fa-plus"></i> New Receipt
			</button>

		</div>
	</div>

	<div class="row clearfix mt-5">
		<div class="col-md-2">
			<div class="nav flex-column nav-pills">
			  <a class="nav-link @if($tab_menu == 'user_info') active @endif " href=" {{ route('users.show', $user->id) }} ">User Info</a>
			  <a class="nav-link @if($tab_menu == 'sales') active @endif "  href="{{ route('user.sales', $user->id) }}">Sales</a>
			  <a class="nav-link @if($tab_menu == 'purchases') active @endif "  href="{{ route('user.purchases', $user->id) }}">Purchases</a>
			  <a class="nav-link @if($tab_menu == 'payments') active @endif "  href="{{ route('user.payments', $user->id) }}">Payments</a>
			  <a class="nav-link @if($tab_menu == 'receipts') active @endif "  href="{{ route('user.receipts', $user->id) }}">Receipts</a>
			</div>
		</div>
		<div class="col-md-10">
			@yield('user_content')
	  	</div>
	</div>



	{{-- Modal For add new payment --}}
	<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	  	{!! Form::open([ 'route' => ['user.payments.store', $user->id], 'method' => 'post' ]) !!}
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="newPaymentModalLabel"> New Payments </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">	
				  <div class="form-group row">
				    <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
				    <div class="col-sm-9">
				      {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
				    <div class="col-sm-9">
				      {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required' ]) }}
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="note" class="col-sm-3 col-form-label">Note </label>
				    <div class="col-sm-9">
				      {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Submit</button>	
	      </div>
	    </div>
	    {!! Form::close() !!}
	  </div>
	</div>




	{{-- Modal For Receipt --}}
	<div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		  	{!! Form::open([ 'route' => ['user.receipts.store', $user->id], 'method' => 'post' ]) !!}
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="newReceiptModalLabel"> New Receipts </h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">	
					  
					  <div class="form-group row">
					    <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
					    <div class="col-sm-9">
					      {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required' ]) }}
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="note" class="col-sm-3 col-form-label">Note </label>
					    <div class="col-sm-9">
					      {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
					    </div>
					  </div>
					  
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Submit</button>	
		      </div>
		    </div>
		    {!! Form::close() !!}
		  </div>
		</div>

@stop
