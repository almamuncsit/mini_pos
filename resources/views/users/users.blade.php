@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-sm-6 col-6">
			<div class="dropdown mr-5">
				<button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Filter By Group
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  	<a class="dropdown-item" href=" {{ route('users.index') }}"> All User </a>
				  	@foreach ($groups as $group)
				  		<a class="dropdown-item" href=" {{ route('users.index') }}?group={{ $group->id }} "> {{ $group->title }} </a>
				  	@endforeach
				</div>
			</div>		
		</div>
		<div class="col-sm-6 col-6 text-right">
			<div class="btn-group">
				<a class="btn btn-info btn-sm" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New user </a>
			</div>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">Users</h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>Name</th>
	              <th class="d-none d-sm-table-cell">Group</th>
	              <th class="d-none d-sm-table-cell">Phone</th>
	              <th class="text-right d-none d-sm-table-cell">Sales</th>
	              <th class="text-right d-none d-sm-table-cell">Purchase</th>
	              <th class="text-right d-none d-sm-table-cell">Receipt</th>
	              <th class="text-right d-none d-sm-table-cell">Payment</th>
	              <th class="text-right">Balance</th>
	              <th class="text-right"></th>
	            </tr>
	          </thead>
	         
	          <tbody>
	          	<?php
	          	$totalSale = 0;
	          	$totalPurchase = 0;
	          	$totalReceipt = 0;
	          	$totalPayment = 0;
	          	$totalBalace = 0;
	          	?>
	          	@foreach ($users as $user)
		            <tr>
		              <td> 
		              	<a href="{{ route('users.show', ['user' => $user->id]) }}"> 
		              		{{ $user->name }} 
		              	</a>
		              </td>
		              <td class="d-none d-sm-table-cell"> {{ optional($user->group)->title }} </td>
		              <td class="d-none d-sm-table-cell"> {{ $user->phone }} </td>
		              <td class="text-right d-none d-sm-table-cell"> 
		              	<?php
		              	 $sale = $user->saleItems()->sum('total');
		              	 $totalSale += $sale;
		              	 echo number_format($sale, 2);
		              	?>
		              </td>
		              <td class="text-right d-none d-sm-table-cell"> 
		              	<?php 
		              		$purchase = $user->purchaseItems()->sum('total');
		              		$totalPurchase += $purchase;
		              		echo number_format($purchase, 2);
		              	?> 
		              </td>
		              <td class="text-right d-none d-sm-table-cell">
		              	<?php 
		              		$receipt = $user->receipts()->sum('amount');
		              		$totalReceipt += $receipt;
		              		echo number_format($receipt, 2);
		              	?>
		              </td>
		              <td class="text-right d-none d-sm-table-cell">
		              	<?php 
		              		$payment = $user->payments()->sum('amount');
		              		$totalPayment += $payment;
		              		echo number_format($payment, 2);
		              	?>
		              </td>
		              <td class="text-right"> 
		              	<?php 
		              		 $balance = ($purchase + $receipt) - ($sale + $payment);
		              		 $totalBalace += $balance;
		              		 echo number_format($balance, 2); 
		              	?> 
		            	</td>
		              <td class="text-right">
		              	
		              	<form method="POST" action=" {{ route('users.destroy', ['user' => $user->id]) }} ">
		              		{{-- <a class="btn btn-primary btn-sm" href="{{ route('users.show', ['user' => $user->id]) }}"> 
			              	 	<i class="fa fa-eye"></i> 
			              	</a>
			              	<a class="btn btn-primary btn-sm" href="{{ route('users.edit', ['user' => $user->id]) }}"> 
			              	 	<i class="fa fa-edit"></i> 
			              	</a> --}}
			              	
			              	<div class="dropdown">
							  <span type="button" id="dropdownMenuButton" data-toggle="dropdown">
							  	<strong>
							    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
								</svg>
								</strong>
							  </span>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    <a class="dropdown-item" href="{{ route('users.show', ['user' => $user->id]) }}"> 
				              	 	<i class="fa fa-eye"></i> View
				              	</a>
				              	<a class="dropdown-item" href="{{ route('users.edit', ['user' => $user->id]) }}"> 
				              	 	<i class="fa fa-edit"></i> Edit
				              	</a>
				              	@if( $user->sales()->count() == 0 && $user->purchases()->count() == 0 && $user->receipts()->count() == 0 && $user->payments()->count() == 0 )
				              		@csrf
				              		@method('DELETE')
				              		<button onclick="return confirm('Are you sure?')" type="submit" class="dropdown-item"> 
				              			<i class="fa fa-trash"></i> Delete
				              		</button>	
			              		@endif
							  </div>
							</div>

			              	{{-- @if( $user->sales()->count() == 0 && $user->purchases()->count() == 0 && $user->receipts()->count() == 0 && $user->payments()->count() == 0 )
			              		@csrf
			              		@method('DELETE')
			              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			              			<i class="fa fa-trash"></i>  
			              		</button>	
		              		@endif --}}
		              	</form>
		              </td>
		            </tr>
	            @endforeach
	          </tbody>

	           <tfoot>
	            <tr>
	              <th>Name</th>
	              <th class="d-none d-sm-table-cell">Group</th>
	              <th class="d-none d-sm-table-cell">Phone</th>
	              <th  class="text-right d-none d-sm-table-cell"> {{ number_format($totalSale, 2) }} </th>
	              <th  class="text-right d-none d-sm-table-cell"> {{ number_format($totalPurchase, 2) }}</th>
	              <th  class="text-right d-none d-sm-table-cell"> {{ number_format($totalReceipt, 2) }}</th>
	              <th  class="text-right d-none d-sm-table-cell"> {{ number_format($totalPayment, 2) }}</th>
	              <th  class="text-right"> {{ number_format($totalBalace, 2) }} </th>
	              <th class="text-right"></th>
	            </tr>
	          </tfoot>

	        </table>
	      </div>
	    </div>
	  </div>


@stop
