@extends('users.user_layout')

@section('user_content')

	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Sales of <strong>{{ $user->name }} </strong></h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th class="d-none d-sm-table-cell">Challen No</th>
		              <th class="d-none d-sm-table-cell">Customer</th>
		              <th>Date</th>
		              <th class="d-none d-sm-table-cell">Qty</th>
		              <th class="text-right">Total</th>
		              <th class="text-right">-</th>
		            </tr>
		          </thead>
		          
		          <tbody>
		          	<?php 
		          		$totalItem = 0;
		          		$grandTotal = 0;
		          	?>
		          	@foreach ($user->sales as $sale)
			            <tr>
			              <td class="d-none d-sm-table-cell"> {{ $sale->challan_no }} </td>
			              <td class="d-none d-sm-table-cell"> {{ $user->name }} </td>
			              <td> {{ $sale->date }} </td>
			              <td class="d-none d-sm-table-cell"> 
			              	<?php 
			              		$itemQty = $sale->items()->sum('quantity');
			              		$totalItem += $itemQty;
			              		echo $itemQty;
			              	 ?>
			              </td>
			              <td class="text-right"> 
			              	<?php 
			              		$total = $sale->items()->sum('total');
			              		$grandTotal += $total;
			              		echo number_format($total, 2);
			              	 ?>
			              </td>
			              <td class="text-right">
			              	<form method="POST" action=" {{ route('user.sales.destroy', ['id' => $user->id, 'invoice_id' => $sale->id ]) }} ">
			              		<a class="btn btn-primary btn-sm" href="{{ route('user.sales.invoice_details', ['id' => $user->id, 'invoice_id' => $sale->id]) }}"> 
				              	 	<i class="fa fa-eye"></i> 
				              	</a>
				              	@if($itemQty == 0)
				              		@csrf
				              		@method('DELETE')
				              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
				              			<i class="fa fa-trash"></i>  
				              		</button>	
			              		@endif
			              	</form>
			              </td>
			            </tr>
		            @endforeach
		          </tbody>

		          <tfoot>
		            <tr>
		              <th class="d-none d-sm-table-cell">Challen No</th>
		              <th class="d-none d-sm-table-cell">Customer</th>
		              <th>Date</th>
		              <th class="d-none d-sm-table-cell"> {{ $totalItem }} </th>
		              <th class="text-right"> {{ number_format($grandTotal, 2) }} </th>
		              <th class="text-right">-</th>
		            </tr>
		          </tfoot>

		        </table>
		      </div>
	    </div>

  	</div>
  	

@stop
