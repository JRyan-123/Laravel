 <!-- Navigation -->
    <div class="header-nav">
      <div class="container-fluid container-xl position-relative">
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('customer.dashboard') }}" class=" @active('customer.dashboard')">Home</a></li>
            <li><a href="{{ route('customer.about') }}" class=" @active('customer.about')">About</a></li>
            <li><a href="{{ route('customer.category') }}" class=" @active('customer.category')">Category</a></li>
            
            <li><a href="{{ route('customer.cart') }}" class=" @active('customer.cart')">Cart</a></li>
            <li><a href="{{ route('customer.payment') }}" class=" @active('customer.payment')">Checkout</a></li>
            

            <li><a href="{{ route('customer.contact') }}" class=" @active('customer.contact')">Contact</a></li>

          </ul>
        </nav>
      </div>
    </div>