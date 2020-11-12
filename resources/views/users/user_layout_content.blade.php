<div class="row clearfix">
	<div class="col-sm-6 col-md-2">
		<div class="nav flex-column nav-pills d-none d-md-block">
		  <a class="nav-link @if($tab_menu == 'user_info') active @endif " href=" {{ route('users.show', $user->id) }} ">User Info</a>
		  <a class="nav-link @if($tab_menu == 'reports') active @endif "  href="{{ route('user.reports', $user->id) }}">Reports</a>
		  <a class="nav-link @if($tab_menu == 'sales') active @endif "  href="{{ route('user.sales', $user->id) }}">Sales</a>
		  <a class="nav-link @if($tab_menu == 'purchases') active @endif "  href="{{ route('user.purchases', $user->id) }}">Purchases</a>
		  <a class="nav-link @if($tab_menu == 'payments') active @endif "  href="{{ route('user.payments', $user->id) }}">Payments</a>
		  <a class="nav-link @if($tab_menu == 'receipts') active @endif "  href="{{ route('user.receipts', $user->id) }}">Receipts</a>
		</div>

		<div class="nav nav-pills inline-block d-md-none mb-2">
		  <a class="nav-link @if($tab_menu == 'user_info') active @endif " href=" {{ route('users.show', $user->id) }} ">User Info</a>
		  <a class="nav-link @if($tab_menu == 'reports') active @endif "  href="{{ route('user.reports', $user->id) }}">Reports</a>
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
