<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title> SAAA | Admin Panel</title>
    <script type="text/javascript">
     var BASE_URL = "{{url('')}}/";
    </script>
    </head>
    <body>
    <nav class="navbar navbar-dark fixed-top bg-dark  flex-md-nowrap p-0 shadow">
        <a class=" navbar-brand col-sm-3 col-md-2 mr-0" href="{{url('cms/dashboard')}}"><i class="fas fa-bicycle mr-2"></i>SAAA | Admin Panel</a>
        <ul class="navbar-nav  px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link text-white " href="{{url('user/logout')}}">Sign out</a>
          </li>
        </ul>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('') }} " target="_blank">Back To Site</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/menu')}}">Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/content')}}">Content</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/categories')}}">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/products')}}">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('cms/orders')}}">Orders</a>
                </li>
               </ul>


            </div>
          </nav>

        @yield('main_content')

        </div>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

  @if(Session::has('sm') )
  <script type="text/javascript">
  toastr.options.positionClass = '{{Session::get('smpos')}}';
  toastr.success('{{Session::get('sm')}}');
   </script>
    @endif

    <script type="text/javascript">
      $('#article').summernote({
        height: 300
        });

    </script>
     <br><br>
    </body>
 </html>
