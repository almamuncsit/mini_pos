@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Products Stock</h2>		
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">Products</h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>ID</th>
	              <th>Category</th>
	              <th>Title</th>
	              <th>Purchases</th>
	              <th>Sales</th>
	              <th>Stock</th>
	            </tr>
	          </thead>
	          
	          <tbody>
	          	@foreach ($products as $product)
		            <tr>
		              <td> {{ $product->id }} </td>
		              <td> {{ $product->category->title }} </td>
		              <td> {{ $product->title }} </td>
		              <td> {{ $purchase = $product->purchaseItems()->sum('quantity') }} </td>
		              <td> {{ $sale = $product->saleItems()->sum('quantity') }} </td>
		              <td> {{  $purchase - $sale }} </td>
		            </tr>
	            @endforeach
	          </tbody>

	          <tfoot>
	            <tr>
	              <th>ID</th>
	              <th>Category</th>
	              <th>Title</th>
	              <th>Purchases</th>
	              <th>Sales</th>
	              <th>Stock</th>
	            </tr>
	          </tfoot>

	        </table>
	      </div>
	    </div>
	  </div>


@stop
