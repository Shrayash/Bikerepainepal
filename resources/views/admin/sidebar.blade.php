<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <!-- <div class="profile-image">
            <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div> -->
          <div class="text-wrapper">
            
            <p class="designation">Bike Repairs Nepal</p>
            <!-- <p class="profile-name">Admin Panel</p> -->
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Admin Panel Menu</li>
      @role('superadmin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.register_cust') }}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Register New</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.check') }}">
          <i class="menu-icon typcn typcn-shopping-bag"></i>
          <span class="menu-title">Search Existing</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Services</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('service.ongoing') }}">Ongoing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('service.resolved') }}">Resolved</a>
            </li>
          
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">Bookings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('customer.newbook')}}"> New Customer Booking </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('customer.oldmobile')}}"> Old Customer Booking </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('book.request') }}"> Booking Requests </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('book.check') }}"> Booked Service </a>
            </li>
            
          </ul>
        </div>
      </li>
      @endrole
      @role('admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon typcn typcn-shopping-bag"></i>
          <span class="menu-title">Book for Service</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon typcn typcn-shopping-bag"></i>
          <span class="menu-title">Servicing History</span>
        </a>
      </li>
      @endrole

      <li class="nav-item">
        <a class="nav-link" href="" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          <i class="menu-icon typcn typcn-shopping-bag"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
     
    
      {{-- <li class="nav-item">
        <a class="nav-link" href="detail_customer_edit.html">
          <i class="menu-icon typcn typcn-th-large-outline"></i>
          <span class="menu-title">User Edit</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="sms_pic.html">
          <i class="menu-icon typcn typcn-th-large-outline"></i>
          <span class="menu-title">SMS Sample</span>
        </a>
      </li> --}}
      
      </ul>
  </nav>