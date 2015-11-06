<section>
  <header>
    <h2 class="thumb-title">{{ $title }}</h2>
    {{--<nav class="simple-pagination">{!! $architectures->render() !!}</nav>--}}
  </header>
  <div class="thumb thumb-br-default clearfix">
    <div class="row">
      @foreach ($houses as $house)
        @include('front.designs._article', ['model' => $house, 'col' => 3])
      @endforeach
    </div>
  </div>
</section>