<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin HIPPAM Tirto Nur Abadi</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('otika/assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/bundles/bootstrap-social/bootstrap-social.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('otika/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{url('otika/assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{url('otika/assets/img/water.ico')}}" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>{{ __('Login') }}</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  @csrf

                    <!-- KETIKA ADA SESSION ERROR  -->
                   @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </em>
                    </div>
                    @endif
                  <div class="form-group">
                    <label for="username">{{ __('Username') }}</label>
                    <input  id="username"  type="text" class="form-control" autocomplete="off" @error('username') is-invalid @enderror name="username" value="{{ old('username') }}" tabindex="1" required autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">{{ __('Password') }}</label>

                    </div>
                    {{-- <input id="password" type="password" class="form-control" autocomplete="off" @error('password') is-invalid @enderror name="password" tabindex="2" required> --}}
                    <div class="input-group">
                        <input id="password" type="password" class="form-control" autocomplete="off" @error('password') is-invalid @enderror name="password" tabindex="2" required>
                        <div class="input-group-prepend">
                          <div class="input-group-text" name="submit" id="show" onclick="ShowPassword()">
                            <i class="fas fa-eye"></i>
                          </div>
                          <div class="input-group-text" style="display:none" id="hide" onclick="HidePassword()">
                            <i class="fas fa-eye-slash"></i>
                          </div>
                          {{-- <input type="button" name="submit" value="SHOW PASSWORD" id="show" onclick="ShowPassword()">
						    <input type="button" style="display:none" id="hide" value="Hide Password" onclick="HidePassword()"> --}}
                        </div>
                      </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <script>
        function ShowPassword()
    {
        if(document.getElementById("password").value!="")
        {
            document.getElementById("password").type="text";
            document.getElementById("show").style.display="none";
            document.getElementById("hide").style.display="block";
        }
    }

    function HidePassword()
    {
        if(document.getElementById("password").type == "text")
        {
            document.getElementById("password").type="password"
            document.getElementById("show").style.display="block";
            document.getElementById("hide").style.display="none";
        }
    }
    </script>
  <!-- General JS Scripts -->
  <script src="{{url('otika/assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{url('otika/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{url('otika/assets/js/custom.js')}}"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
