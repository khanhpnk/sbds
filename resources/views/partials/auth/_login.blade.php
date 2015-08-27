<form accept-charset="UTF-8" action="/ajax-auth/login" method="POST" role="form" id="loginForm">
  {!! csrf_field() !!}
  <p class="text-danger">{{-- Placehouse error message login --}}</p>

  <div class="form-group">
    <label class="sr-only">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="ĐỊA CHỈ EMAIL">
  </div>
  <div class="form-group">
    <label class="sr-only">Password</label>
    <input type="password" name="password" class="form-control" placeholder="MẬT KHẨU">
  </div>
  <button type="submit" class="btn btn-info btn-block" id="loginBtnSubmit" autocomplete="off">ĐĂNG NHẬP</button>
  <p class="help-block">
    <a href="#register">Bạn cần một tài khoản?</a><br>
    <a href="#resetpassword">Quên mật khẩu?</a>
  </p>
  <a href="/social-login/facebook" class="btn btn-primary btn-block" role="button">
    ĐĂNG NHẬP BẰNG FACEBOOK <i class="fa fa-facebook-square"></i>
  </a>
  <a href="/social-login/google" class="btn btn-danger btn-block" role="button">
    ĐĂNG NHẬP BẰNG GOOGLE <i class="fa fa-google"></i>
  </a>
  <a href="/social-login/github" class="btn btn-success btn-block" role="button">
    ĐĂNG NHẬP BẰNG GITHUB <i class="fa fa fa-github-alt"></i>
  </a>
</form>