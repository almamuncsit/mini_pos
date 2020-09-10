@extends('users.user_layout')

@section('user_content')

	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  	<?php 
	                  	$total = 0;
	                  	foreach ($user->sales as $sale) {
	                  		$total += $sale->items()->sum('total');
	                  	}
	                  	echo $total;
                  	?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-chart fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

       <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Purchase</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  	<?php 
	                  	$total = 0;
	                  	foreach ($user->purchases as $purchase) {
	                  		$total += $purchase->items()->sum('total');
	                  	}
	                  	echo $total;
                  	?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

       <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Receipts</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->receipts()->sum('amount') }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

       <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Payments</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $user->payments()->sum('amount') }} </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

	</div>

	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> {{ $user->name }} </h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-8">
	    			<table class="table table-borderless table-striped">
			      	<tr>
			      		<th class="text-right">Group :</th>
			      		<td> {{ $user->group->title }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Name : </th>
			      		<td> {{ $user->name }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Eamil : </th>
			      		<td> {{ $user->email }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Phone : </th>
			      		<td> {{ $user->phone }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Address : </th>
			      		<td> {{ $user->address }} </td>
			      	</tr>
				     </table>
	    		</div>
	    	</div>
	    </div>

	</div>

@stop