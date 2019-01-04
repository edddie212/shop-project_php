<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="text-white mr-2 a-no-dec" href="{{url('shop/checkout')}}">
    <i class="fas fa-shopping-cart mr-1"></i>

   @if(! Cart::isEmpty())
    <div class="cart_total">
    {{ Cart::getTotalQuantity()}}
    </div>
  @endif

  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('')}}"><i class="fa-2x">SAAA</i><i class="fas fa-bicycle fa-2x"></i> </a>
      </li>
         @if(! empty($menu))
         @foreach($menu as $item)
         <li class="nav-item active">
           <a class="nav-link" href="{{url($item['url'])}}">{{ $item['link'] }}</a>
         </li>

         @endforeach
         @endif

      <li class="nav-item active">
        <a class="nav-link" href="{{url('shop')}}">Shop </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      @if(Session::has('user_id'))
      <li class="nav-item active">
        <a class="nav-link" href="{{url('user/profile')}}">{{Session::get('user_name')}} </a>
      </li>
      @if(Session::has('is_admin'))
      <li class="nav-item active">
        <a class="nav-link" href="{{url('cms/dashboard')}}">Admin Panel</a>
      </li>
      @endif
      <li class="nav-item active">
        <a class="nav-link" href="{{url('user/logout')}}">Logout</a>
      </li>
      @else
      <li class="nav-item active">
        <a class="nav-link" href="{{url('user/signup')}}">Sign Up </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('user/signin')}}">Sign In </a>
      </li>

     @endif
    </ul>
  </div>
</nav>
