<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="/highdamin/light/assets/images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/css/admin.min.css')}}" >
    <link href="{{asset('highdamin/light/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('highdamin/light/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    <title>SIMARSIP ADMIN</title>
  </head>

  <body>
  
  <div class="card mb-3;">
      <div class="pt-3">
          <div class="ml-5">
             <h4>SIMARSIP ADMIN</h4>
          </div>
       </div>
  </div>

  <div class="mt-5">
    <section class="row justify-content-center">
      <div class="card text-white bg-dark mb-3" style="width: 30rem;">
        <div class="card-body">
          <h4 class="text-center">
          <div>Admin SIMARSIP</div>
            <div class="mt-2">Masuk</div>
          </h4>

          <form class="form-horizontal" method="POST" role="form" action="{{route('admin-login')}}">
            {{ csrf_field() }}
            <div class="mx-auto" style="width: 400px;">
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Email</label>
                  <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukan Email">
                  @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
              </div>
            <br>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Kata Sandi</label>
                  <input class="form-control" type="password" id="password" name="password" value="{{ old('password') }}" required autofocus placeholder="Masukan Kata Sandi">
                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
              </div>
                
              <div class="pt-3"> <button type="submit" class="btn btn-primary btn-block">MASUK</button> </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="/js/admin.min.js"></script>


  </body>
</html>

