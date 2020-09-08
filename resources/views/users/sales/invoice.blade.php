@extends('users.user_layout')

@section('user_content')

	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Sales Inoice Details </h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-6">
	    			<div class="no_padding no_margin"> <strong>Customer:</strong>  {{ $user->name }}</div>
	    			<div class="no_padding no_margin"><strong>Email:</strong> {{ $user->email }}</div>
	    			<div class="no_padding no_margin"><strong>Phone:</strong> {{ $user->phone }}</div>
	    		</div>
	    		<div class="col-md-3"></div>
	    		<div class="col-md-3">
	    			<div class="no_padding no_margin"><strong>Date:</strong> {{ $invoice->date }} </div>
	    			<div class="no_padding no_margin"><strong>Challen No:</strong> {{ $invoice->challan_no }} </div>
	    		</div>
	    	</div>
	    	<div class="invoice_items">
	    		<table class="table table-borderless ">
	    			<thead>
	    				<th>SL</th>
	    				<th>Product</th>
	    				<th>Price</th>
	    				<th>Qty</th>
	    				<th>Total</th>
	    				<th class="text-right">-</th>
	    			</thead>
	    			<tbody>
	    				@foreach ($invoice->items as $key => $item)
		    				<tr>
		    					<td> {{ $key+1 }} </td>
		    					<td> {{ $item->product->title }} </td>
		    					<td> {{ $item->price }} </td>
		    					<td> {{ $item->quantity }} </td>
		    					<td> {{ $item->total }} </td>
		    					<td class="text-right">
		    						<form 
		    							method="POST" 
		    							action=" {{ route('user.sales.invoices.delete_item', ['id' => $user->id, 'invoice_id' => $invoice->id, 'item_id'=> $item->id]) }} 
		    						">
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
	    			<tfoot>
	    				<th></th>
	    				<th> 
	    					<button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#newProduct">
	    						<i class="fa fa-plus "></i> Add Product 
	    					</button> 
	    				</th>
	    				<th colspan="2" class="text-right"> Total: </th>
	    				<th> {{ $invoice->items()->sum('total') }} </th>
	    				<th></th>
	    			</tfoot>
	    		</table>
	    	</div>
	    </div>

	</div>



	{{-- Modal For Add new Product --}}
	<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  	{!! Form::open([ 'route' => ['user.sales.invoices.add_item', ['id' => $user->id, 'invoice_id' => $invoice->id] ], 'method' => 'post' ]) !!}
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="newProductModalLabel"> New Sale Invoice </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      	<div class="modal-body">	
					  
					<div class="form-group row">
					    <label for="product" class="col-sm-3 col-form-label text-right">Product <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      {{ Form::select('product_id', $products, NULL, [ 'class'=>'form-control', 'id' => 'product', 'required', 'placeholder' => 'Select Product' ]) }}
					    </div>
					</div>

					<div class="form-group row">
					    <label for="price" class="col-sm-3 col-form-label  text-right">Unite Price <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      	{{ Form::text('price', NULL, [ 'class'=>'form-control', 'id' => 'price', 'placeholder' => 'Unite Price', 'required' ]) }}
					    </div>
					</div>

					<div class="form-group row">
					    <label for="quantity" class="col-sm-3 col-form-label  text-right">Quantity <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      	{{ Form::text('quantity', NULL, [ 'class'=>'form-control', 'id' => 'quantity', 'placeholder' => 'Quantity', 'required' ]) }}
					    </div>
					</div>

					<div class="form-group row">
					    <label for="total" class="col-sm-3 col-form-label  text-right">Total <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      	{{ Form::text('total', NULL, [ 'class'=>'form-control', 'id' => 'total', 'placeholder' => 'Total', 'required' ]) }}
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