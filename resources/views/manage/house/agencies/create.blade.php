@extends('manage.layout')

@section('meta_title')
  Môi giới đăng tin
@stop

@section('title')
  Môi giới đăng tin
@stop

@section('javascript')
  @parent
  <script>
    $(function() {
      $('#collapseTwo').collapse('show');
    });
  </script>
@stop

@section('content')
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Giới thiệu về công ty môi giới
        </a></h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <section>
            @include('partial.form._text', ['name' => 'name', 'label' => 'Tên công ty'])
            @include('partial.form._textarea', ['name' => 'short_description', 'label' => 'Giới thiệu ngắn gọn', 'rows' => 4])
            @include('partial.form._textarea', ['name' => 'description', 'label' => 'Giới thiệu chi tiết', 'rows' => 8])
            <button type="submit" class="btn btn-primary btn-block">Tạo mới công ty ngay để đăng tin </button>
          </section>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Môi giới đăng tin
        </a></h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.agency.store') }}" method="POST" role="form" id="houseForm">
            <input type="hidden" id="is_owner" name="is_owner" value="2">
            @include('manage.house.partial._form', ['submitBtnText' => 'Đăng tin ngay'])
          </form>
        </div>
      </div>
    </div>
  </div>
@stop