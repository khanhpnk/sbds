<header><h1 class="article-title">{{ $design->title }}</h1></header>
<section class="article-head">
  <div class="row">
    <div class="col-md-9">
      {{-- */ $location = LocationHelper::full($design->city, $design->district, $design->ward) /* --}}
      <address class="article-head-address">
        Địa chỉ:
        {{ $design->address }},
        <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                          'city' => str_slug($location['city']),
                          'cityId' 			=> $design->city,
                          'district' 		=> str_slug($location['district']),
                          'districtId' 	=> $design->district,
                          'ward' 				=> str_slug($location['ward']),
                          'wardId' 			=> $design->ward]) }}">
          {{ $location['ward'] }}
        </a>
        <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                          'city' => str_slug($location['city']),
                          'cityId' 			=> $design->city,
                          'district' 		=> str_slug($location['district']),
                          'districtId' 	=> $design->district]) }}">
          {{ $location['district'] }}
        </a>
        <a href="{{ UrlHelper::index(ResourceOption::DU_AN, [
                          'city' => str_slug($location['city']),
                          'cityId' => $design->city]) }}">
          {{ $location['city'] }}
        </a>
      </address>
    </div>
    <div class="col-md-3">
      <div class="article-head-fb-like">
        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="article-head-code">N{{ $design->id }}</div>
    </div>
    <div class="col-md-2">
      <div class="article-head-date"><time>{{ $design->start_date }}</time></div>
    </div>
  </div>
</section>

{{-- gallery section --}}
{{-- */ $design->user_id = 1 /* --}}
@include('houses._gallery', ['model' => $design, 'resource' => ResourceOption::THIET_KE])

<section class="article-description">
  {!! nl2br($design->description) !!}
</section>

<hr>
<div class="fb-comments" data-href="{{ UrlHelper::show(ResourceOption::THIET_KE, ['slug' => $design->slug]) }}" data-width="675" data-numposts="2"></div>

<section class="relation">
  <header><h3 class="article-section-title">Khác</h3></header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @foreach ($designs as $relation)
        @include('front.designs._article', ['model' => $relation, 'resource' => ResourceOption::NHA_DAT])
      @endforeach
    </div>
  </div>
</section>