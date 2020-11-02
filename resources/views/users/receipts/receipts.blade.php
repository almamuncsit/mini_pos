@extends('users.user_layout')

@section('user_content')

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Receipts of <strong>{{ $user->name }} </strong></h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th class="d-none d-sm-table-cell">Admin</th>
		              <th>Date</th>
		              <th class="text-right">Total</th>
		              <th class="d-none d-sm-table-cell">Note</th>
		              <th class="text-right">-</th>
		            </tr>
		          </thead>
		          <tfoot>
		            <tr>
		              <th class="d-none d-sm-table-cell"></th>
		              <th>Total:</th>
		              <th class="text-right"> {{ number_format($user->receipts()->sum('amount'), 2) }} </th>
		              <th class="d-none d-sm-table-cell"></th>
		              <th class="text-right"></th>
		            </tr>
		          </tfoot>
		          <tbody>
		          	@foreach ($user->receipts as $receipt)
			            <tr>
			              <td class="d-none d-sm-table-cell"> {{ optional($receipt->admin)->name  }} </td>
			              <td> {{ $receipt->date }} </td>
			              <td class="text-right"> {{ number_format($receipt->amount, 2) }} </td>
			              <td class="d-none d-sm-table-cell"> {{ $receipt->note }} </td>
			              <td class="text-right">
			              	<form method="POST" action=" {{ route('user.receipts.destroy', ['id' => $user->id, 'receipt_id' => $receipt->id]) }} ">
			              		@csrf
			              		@method('DELETE')
			              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			              			<i class="fa fa-trash"></i>  
			              		</button>	
			              	</form>
			              </td>
			            </tr>
		            @endforeach
		          </tbody>
		        </table>
		    </div>
	    </div>
  	</div>	

@stop
