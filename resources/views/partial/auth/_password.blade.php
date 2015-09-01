<form accept-charset="UTF-8" action="/password/email" method="POST" role="form" id="resetPasswordForm">
  {!! csrf_field() !!}
  <p class="text-danger">{{-- Placehouse error message login --}}</p>

  <div class="form-group">
    <label class="sr-only">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="ĐỊA CHỈ EMAIL">
  </div>
  <button type="submit" class="btn btn-info btn-block" autocomplete="off">GỬI EMAIL XÁC NHẬN</button>
</form>