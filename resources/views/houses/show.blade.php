@extends('layout')

@section('content')
	<article>
		<header><h1 class="article-title">{{ $house->title }}</h1></header>
		<div class="clearfix">
			<address class="article-address">
				Địa chỉ:
				<a href="#">16 Phú mỹ hưng</a>,
				<a href="#">Lâm tiến</a>,
				<a href="#">Hai bà trưng</a>,
				<a href="#">Hồ chí minh</a>
			</address>
			<div class="article-fb-like">
				<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="article-price">900 triệu/tháng/m2</div>
			</div>
			<div class="col-md-2">
				<div class="article-code">N12455737</div>
			</div>
			<div class="col-md-2">
				<div class="article-date"><time>18/7/2015</time></div>
			</div>
		</div>

		@include('houses._gallery')

		<section class="detail">
			<header><h3 class="section-title">Chi tiết</h3></header>
			<div class="row">
				<div class="col-md-3">
					aaa
				</div>
				<div class="col-md-3">
					bbb
				</div>
				<div class="col-md-3">
					ccc
				</div>
			</div>
		</section>

		<section class="feature">
			<header><h3 class="section-title">Tính năng</h3></header>
			<div class="row">
				<div class="col-md-3">
					aaa
				</div>
				<div class="col-md-3">
					bbb
				</div>
				<div class="col-md-3">
					ccc
				</div>
			</div>
		</section>

		<div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="2"></div>

		<section class="relation">
			<header><h3 class="section-title">Nhà đất tương tụ</h3></header>
		</section>


	</article>
@stop
