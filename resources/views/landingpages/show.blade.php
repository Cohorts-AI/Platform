@extends('landingpages.layout')

@section('content')
<div class="landing_wrapper {{ $landing->class }}">
	
	<nav class="main_nav">
		<ul>
			<li><a href="#">Services</a></li>
			<li><a href="#">Apothecary</a></li>
			<li><a href="#">Hours & Information</a></li>
		</ul>
		<ul class="social">
			<li><a href="#"><i class="fab fa-yelp"></i></a></li>
			<li><a href="#"><i class="fab fa-instagram"></i></a></li>
			<li><a href="#"><i class="fab fa-facebook"></i></a></li>
		</ul>
	</nav>
	
	<section class="hero" @if(isset($landing->fields->Background[0]->url))style="background-image: url({{ $landing->fields->Background[0]->url }})@endif">
		<img src="{{ $landing->fields->Logo[0]->url }}">
	</section>
	
	<section class="about_blocks">
		<div class="block">
			<div>
				<span>1.</span>
				<h3>Hair Salon</h3>
				<p>Lorem ipsum dolor sit amet</p>
			</div>
		</div>
		<div class="block">
			<div>
				<span>2.</span>
				<h3>Skin & Makeup</h3>
				<p>Lorem ipsum dolor sit amet</p>
			</div>
		</div>
		<div class="block">
			<div>
				<span>3.</span>
				<h3>Apothecary</h3>
				<p>Lorem ipsum dolor sit amet</p>
			</div>
		</div>
	</section>
	
	<section id="services" class="services"></section>
	
	<section id="apothecary" class="apothecary"></section>
	
	<section id="information" class="information"></section>
	
	<footer></footer>
	
</div>
@endsection