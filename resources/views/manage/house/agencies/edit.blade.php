@extends('manage.layout')

@section('meta_title')
  Môi giới đăng tin
@stop

@section('title')
  Môi giới đăng tin
@stop

@section('content')
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
            Giới thiệu về công ty môi giới
        </a></h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <form accept-charset="UTF-8" action="{{ route('company.save') }}" role="form" id="companyForm">
            @include('manage.house.partial.company._form')
          </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Môi giới đăng tin
        </a></h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <form accept-charset="UTF-8" enctype="multipart/form-data" action="{{ route('m.agency.update', ['id' => $house->id]) }}" method="POST" role="form" id="houseForm">
            <input type="hidden" name="_method" value="PUT">
            @include('manage.house.partial.house._form', [
              'submitBtnText' => 'Cập nhật thay đổi',
              'checkUniqueUrl' => route('agency.unique', ['id' => $house->id])
            ])
          </form>
        </div>
      </div>
    </div>
  </div>
@stop