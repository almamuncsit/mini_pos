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
	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th class="d-none d-sm-table-cell">ID</th>
	              <th class="d-none d-sm-table-cell">Category</th>
	              <th>Title</th>
	              <th class="d-none d-sm-table-cell">Purchases</th>
	              <th class="d-none d-sm-table-cell">Sales</th>
	              <th class="text-right">Stock</th>
	            </tr>
	          </thead>
	          
	          <tbody>
	          	@foreach ($products as $product)
		            <tr>
		              <td class="d-none d-sm-table-cell"> {{ $product->id }} </td>
		              <td class="d-none d-sm-table-cell"> {{ $product->category->title }} </td>
		              <td> {{ $product->title }} </td>
		              <td class="d-none d-sm-table-cell"> {{ $purchase = $product->purchaseItems()->sum('quantity') }} </td>
		              <td class="d-none d-sm-table-cell"> {{ $sale = $product->saleItems()->sum('quantity') }} </td>
		              <td class="text-right"> {{  $purchase - $sale }} </td>
		            </tr>
	            @endforeach
	          </tbody>

	          <tfoot>
	            <tr>
	              <th class="d-none d-sm-table-cell">ID</th>
	              <th class="d-none d-sm-table-cell">Category</th>
	              <th>Title</th>
	              <th class="d-none d-sm-table-cell">Purchases</th>
	              <th class="d-none d-sm-table-cell">Sales</th>
	              <th class="text-right">Stock</th>
	            </tr>
	          </tfoot>

	        </table>
	      </div>
	    </div>
	  </div>


@stop
