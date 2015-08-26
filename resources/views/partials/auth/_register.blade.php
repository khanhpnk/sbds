<form accept-charset="UTF-8" action="/ajax-auth/register" method="POST" role="form" id="registerForm">
  {!! csrf_field() !!}
  <p class="text-danger">{{-- Placehouse error message --}}</p>

  <div class="form-group">
    <label class="sr-only">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="ĐỊA CHỈ EMAIL">
  </div>
  <div class="form-group">
    <label class="sr-only">Password</label>
    <input type="password" name="password" class="form-control" placeholder="MẬT KHẨU">
  </div>
  <div class="form-group">
    <label class="sr-only">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" placeholder="NHẬP LẠI MẬT KHẨU">
  </div>
  <button type="submit" class="btn btn-info btn-block" autocomplete="off">ĐĂNG KÝ</button>
</form>