<!DOCTYPE html>
<html lang="en">


<!-- export-table.html  21 Nov 2019 03:55:25 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin HIPPAM Tirto Nur Abadi</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('otika/assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('otika/assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{url('otika/assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{url('otika/assets/img/water.ico')}}" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>

          </ul>
        </div>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{url('otika/assets/img/user.png')}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">

              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{url('/home/')}}"><span class="logo-name">HIPPAM</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown {{Request::is('home') ? 'active':''}}">
              <a href="{{url('/home/')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown {{ Request::is('pegawai') ? 'active':'' }} || {{ Request::is('golongan') ? 'active':'' }} || {{Request::is('pelanggan') ? 'active':''}} || {{Request::is('user') ? 'active':''}}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Master Data</span></a>
              <ul class="dropdown-menu">
                <li class="{{Request::is('pegawai') ? 'active':''}}"><a class="nav-link" href="{{url('/pegawai/')}}">Data Pegawai</a></li>
                <li class="{{Request::is('golongan') ? 'active':''}}"><a class="nav-link" href="{{url('/golongan/')}}">Data Golongan</a></li>
                <li class="{{Request::is('pelanggan') ? 'active':''}}"><a class="nav-link" href="{{url('/pelanggan/')}}">Data Pelanggan</a></li>
                <li class="{{Request::is('user') ? 'active':''}}"><a class="nav-link" href="{{url('/user/')}}">Data User</a></li>
              </ul>
            </li>

            <li class="dropdown {{Request::is('tagihan') ? 'active':''}}">
              <a href="{{url('/tagihan/')}}" class="nav-link"><i data-feather="briefcase"></i><span>Tagihan</span></a>
            </li>
            <li class="dropdown {{Request::is('totaltagihan') ? 'active':''}}">
              <a href="{{url('/totaltagihan/')}}" class="nav-link"><i data-feather="dollar-sign"></i><span>Total Tagihan</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        {{-- <section class="section">
          <div class="section-body"> --}}
            @yield('content')

          {{-- </div>
        </section> --}}

        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">hippamtirtonurabadi</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script src="{{url('otika/assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="{{url('otika/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/jszip.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
  <script src="{{url('otika/assets/js/page/datatables.js')}}"></script>
  <!-- Daterangepicker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- Sweetalert -->
  <!-- JS Libraies -->
  <script src="{{url('otika/assets/bundles/sweetalert/sweetalert.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{url('otika/assets/js/page/sweetalert.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{url('otika/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{url('otika/assets/js/custom.js')}}"></script>


<script>
    $(".swal-6").click(function (e) {
    var id = $(this).attr('data-id');
    swal({
        title: 'Yakin hapus data?',
        text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            // swal('Poof! Your imaginary file has been deleted!', {
            // icon: 'success',
            // });
            $(`#delete${id}`).submit();
        } else {
            // swal('Your imaginary file is safe!');
        }
        });
    });
</script>

</body>


<!-- export-table.html  21 Nov 2019 03:56:01 GMT -->
</html>
