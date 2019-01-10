@extends('landingpages.layout')

@section('content')
<div class="landing_wrapper {{ $landing->class }}">
	
	<nav class="main_nav">
		<ul>
			<li><a href="#services">Services</a></li>
			<li><a href="#apothecary">Apothecary</a></li>
			<li><a href="#hours">Hours & Information</a></li>
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
	
  <div id="services"></div>
  
	<section class="about_blocks">
		
		<?php $blocks = $landing->blocks; ?>
		
		@if(isset($blocks))
			@foreach($blocks as $block)
			<div id="services" class="block">
				<div>
					<span>{{ $block->fields->Title }}</span>
					<h3>{{ $block->fields->Subtitle }}</h3>
					<p>{{ $block->fields->Description }}</p>
				</div>
			</div>
			@endforeach
	  @endif
		
	</section>
	
  <div id="apothecary"></div>
  
	<section class="apothecary">
    <div class="apothecary-hero">
      <img src="{{ asset('landings/ilocollective/apothecary.jpg') }}">
    </div>
    <div class="apothecary-copy">
      <h2>Apothecary</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="clear"></div>
  </section>
	
  <div id="hours"></div>
  
	<section class="hours">
    <h2>Hours & Information</h2>
    <div>
      <h3>Tuesday - Friday</h3>
      <p>10 am - 7 pm</p>
    </div>
    <div>
      <h3>Saturday</h3>
      <p>9 am - 7 pm</p>
    </div>
    <div>
      <h3>Sunday & Monday</h3>
      <p>CLOSED</p>
    </div>
  </section>
	
	
</div>
@endsection