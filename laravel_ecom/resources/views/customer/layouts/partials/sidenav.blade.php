<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
          <span class="align-middle">Customer Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>

					<li class="sidebar-item @active('customer.dashboard')">
						<a class="sidebar-link" href="{{ route('customer.dashboard') }}">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					<li class="sidebar-item  @active('customer.order.history')">
						<a class="sidebar-link" href="{{ route('customer.order.history') }}">
			              <i class="align-middle" data-feather="package"></i> <span class="align-middle">Order History</span>
			            </a>
					</li>

					<li class="sidebar-item @active('customer.payment.setting')">
						<a class="sidebar-link" href="{{ route('customer.payment.setting') }}">
			              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					<li class="sidebar-item  @active('customer.affiliate')">
						<a class="sidebar-link" href="{{ route('customer.affiliate') }}">
			              <i class="align-middle" data-feather="pocket"></i> <span class="align-middle">Affiliate</span>
			            </a>
					</li>

					
					

					
				
				</ul>

			
			</div>
		</nav>