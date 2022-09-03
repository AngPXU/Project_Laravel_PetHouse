<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PetHouse - Đăng nhập</title>

  <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/select.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{asset('public/backend/img/pethouse.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>ĐĂNG KÝ AUTH</h4></div>

              <div class="card-body">
                <form action="{{URL::to('/register')}}" method="post" class="needs-validation" novalidate="">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input id="name" type="name" class="form-control" name="admin_name" value="{{old('admin_name')}}" placeholder="Nhập tài khoản..." tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Vui lòng nhập tài khoản của bạn
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input id="phone" type="phone" class="form-control" name="admin_phone" value="{{old('admin_phone')}}" placeholder="Nhập tài khoản..." tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Vui lòng nhập tài khoản của bạn
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Tài khoản</label>
                    <input id="email" type="email" class="form-control" name="admin_email" placeholder="Nhập tài khoản..." tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Vui lòng nhập tài khoản của bạn
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Mật khẩu</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="admin_password" placeholder="Nhập mật khẩu..." tabindex="2" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập mật khẩu của bạn
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Đăng nhập
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Hoặc đăng nhập bằng</div>
                  <a class="btn btn-block" href="{{URL::to('/register-auth')}}">
                    Đăng ký Auth
                 </a>
                 <a class="btn btn-block" href="{{URL::to('/login-auth')}}">
                    Đăng nhập Auth
                 </a>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook" href="{{URL::to('/login-facebook')}}">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter" href="{{URL::to('/login-google')}}">
                      <span class="fab fa-twitter"></span> Google
                    </a>                                
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- General JS Scripts -->
<script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/js/popper.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.min.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
</body>
</html>
