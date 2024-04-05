<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - لوحة القيادة</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <Header>
        <!-- Navbar -->
        <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <!-- Container wrapper -->
  <div class="container-fluid">
      <!-- Navbar brand -->
      <a class="navbar-brand" href="#">Brand</a>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
          <li class="nav-item me-3 me-lg-0">
              <a class="nav-link text-white" href="#"><i class="fas fa-envelope mx-1"></i> Contact</a>
          </li>
          <li class="nav-item me-3 me-lg-0">
              <a class="nav-link text-white" href="#"><i class="fas fa-cog mx-1"></i> Settings</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user mx-1"></i> Welcome  {{ Auth::user()->name }}! 
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">My account</a>
              <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
            </div>
          </li>
      </ul>
  </div>

  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
        <!-- Navbar --> 
  </Header>

    <main>
    <div class="row" style="color: white;">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu" >
                        <li class="nav-item text-white" >
                            <a href="{{route('index')}}" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('products')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Product</span> </a>
        
                        </li>
                        <li>
                            <a href="{{route('products-details')}}" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Products details</span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle  text-white">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Cards</span></a>

                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Invoice</span> </a>
                        
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                        </li>
                    </ul>
                    <hr>
                    
                </div>
            </div>
        

        <div class="col-sm-9">
            @yield('content')
        </div>
</div>
    </main>
    <footer>

    </footer>
    
</body>
</html>