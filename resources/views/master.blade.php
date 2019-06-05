<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/pathto/css/sweetalert.css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Raka Mart</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>

</nav>

<div id="wrapper">

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    @if(auth::user()->level == 1)
    <li class="nav-item">
      <a class="nav-link" href="{{ route('kategori.index') }}">
        <i class="fas fa-fw fa-cube"></i>
        <span>Kategori</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('produk.index') }}">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Produk</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.index') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Member</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('supplier.index') }}">
              <i class="fas fa-fw fa-truck"></i>
              <span>Supplier</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-money-bill-wave-alt"></i>
                <span>Pengeluaran</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-fw fa-user"></i>
                  <span>User</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Penjualan</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <i class="fas fa-fw fa-download"></i>
                      <span>Pembelian</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-file-pdf"></i>
                        <span>Laporan</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="fas fa-cogs"></i>
                          <span>Setting</span></a>
                        </li>
                        @else
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                            <span>Transaksi</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="fas fa-fw fa-cart-plus"></i>
                              <span>Transaksi Baru</span></a>
                            </li>
                            @endif
                          </ul>

                          <div id="content-wrapper">

                            <div class="container-fluid">
                              @include('flash-message')
                              @yield('content')

                            </div>
                            <!-- /.container-fluid -->

                            <!-- Sticky Footer -->
                            <footer class="sticky-footer">
                              <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                  <span>Copyright © Your Website 2019</span>
                                </div>
                              </div>
                            </footer>

                          </div>
                          <!-- /.content-wrapper -->

                        </div>
                        <!-- /#wrapper -->

                        <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                          <i class="fas fa-angle-up"></i>
                        </a>


                        <!-- Bootstrap core JavaScript-->
                        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
                        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                        <!-- Page level plugin JavaScript-->
                        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
                        <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
                        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="{{ asset('js/sb-admin.min.js') }}"></script>

                        <!-- Demo scripts for this page-->
                        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
                        <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>

                        @yield('script')

                      </body>

                      </html>
