@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-6">
			<h2> Products </h2>		
		</div>
		<div class="col-6 text-right">
			<a class="btn btn-info" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> New Product </a>
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
	              <th>Category</th>
	              <th>Title</th>
	              <th class="d-none d-sm-table-cell">Cost Price</th>
	              <th class="text-right">Price</th>
	              <th class="d-none d-sm-table-cell">Has Stock</th>
	              <th class="text-right">-</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th class="d-none d-sm-table-cell">ID</th>
	              <th>Category</th>
	              <th>Title</th>
	              <th class="d-none d-sm-table-cell">Cost Price</th>
	              <th class="text-right">Price</th>
	              <th class="d-none d-sm-table-cell">Has Stock</th>
	              <th class="text-right">-</th>
	            </tr>
	          </tfoot>
	          <tbody>
	          	@foreach ($products as $product)
		            <tr>
		              <td class="d-none d-sm-table-cell"> {{ $product->id }} </td>
		              <td> {{ $product->category->title }} </td>
		              <td> {{ $product->title }} </td>
		              <td class="d-none d-sm-table-cell"> {{ $product->cost_price }} </td>
		              <td class="text-right"> {{ $product->price }} </td>
		              <td class="d-none d-sm-table-cell"> {{ ($product->has_stock == 1) ? 'Yes' : 'No' }} </td>
		              <td class="text-right">

		              	<form method="POST" action=" {{ route('products.destroy', ['product' => $product->id]) }} ">
		              		{{-- <a class="btn btn-primary btn-sm" href="{{ route('products.show', ['product' => $product->id]) }}"> 
			              	 	<i class="fa fa-eye"></i> 
			              	</a>
			              	<a class="btn btn-primary btn-sm" href="{{ route('products.edit', ['product' => $product->id]) }}"> 
			              	 	<i class="fa fa-edit"></i> 
			              	</a>
		              		@csrf
		              		@method('DELETE')
		              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
		              			<i class="fa fa-trash"></i>  
		              		</button> --}}
		              	
			              	<div class="dropdown">
							  <span type="button" id="dropdownMenuButton" data-toggle="dropdown">
							  	<strong>
							    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
								</svg>
								</strong>
							  </span>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    <a class="dropdown-item" href="{{ route('products.show', ['product' => $product->id]) }}"> 
				              	 	<i class="fa fa-eye"></i> View
				              	</a>
				              	<a class="dropdown-item" href="{{ route('products.edit', ['product' => $product->id]) }}"> 
				              	 	<i class="fa fa-edit"></i> Edit
				              	</a>
				              	@csrf
			              		@method('DELETE')
			              		<button onclick="return confirm('Are you sure?')" type="submit" class="dropdown-item"> 
			              			<i class="fa fa-trash"></i>   Delete
			              		</button>
							  </div>

						  </form>
						</div>
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>


@stop
