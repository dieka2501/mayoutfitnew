<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li {{ (Request::is('*order') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/order">
      <i class="fa fa-bell"></i>
      <span>Order</span>
    </a>
  </li>
  <!-- <li {{ (Request::is('*brand') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/brand">
      <i class="fa fa-asterisk"></i>
      <span>Brand</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*categories') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/categories">
      <i class="fa fa-tag"></i>
      <span>Categories</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*product') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/product">
      <i class="fa fa-list"></i>
      <span>Product</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*galeries') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/galeries">
      <i class="fa fa-image"></i>
      <span>Galery</span>
    </a>
  </li> -->
  
  <!-- <li {{ (Request::is('*sales-offline') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/sales-offline">
      <i class="fa fa-bell-slash"></i>
      <span>Sales Offline</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*promo') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/promo">
      <i class="fa fa-files-o"></i>
      <span>Promo</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*voucher') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/voucher">
      <i class="fa fa-money"></i>
      <span>Voucher</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*news') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/news">
      <i class="fa fa-ticket"></i>
      <span>News &amp; Event</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*banner') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/banner">
      <i class="fa fa-files-o"></i>
      <span>Banner Management</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*report') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/report/order">
      <i class="fa fa-bar-chart"></i>
      <span>Report Order</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*configuration') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/configuration">
      <i class="fa fa-gear"></i>
      <span>Configuration</span>
    </a>
  </li> -->
  <!-- <li {{ (Request::is('*user') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/user">
      <i class="fa fa-user"></i>
      <span>User</span>
    </a>
  </li> -->
  <li {{ (Request::is('*membertype') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/membertype">
      <i class="fa fa-child"></i>
      <span>Member Type</span>
    </a>
  </li>
  <li {{ (Request::is('*customer') ? 'class="active"' : '') }}>
    <a href="{!!config('app.url')!!}public/admin/customer">
      <i class="fa fa-users"></i>
      <span>Customer</span>
    </a>
  </li>
  
</ul>