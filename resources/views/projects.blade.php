@extends('layouts.main')

@section('content')
<section class="articles projects">
	<h1 class="page-header">
		Case Studies<br>
    <svg width="184" height="16" viewBox="0 0 184 16" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M100.707 0.707107C101.098 0.316583 101.098 -0.316583 100.707 -0.707107L94.3431 -7.07107C93.9526 -7.46159 93.3195 -7.46159 92.9289 -7.07107C92.5384 -6.68054 92.5384 -6.04738 92.9289 -5.65685L98.5858 0L92.9289 5.65685C92.5384 6.04738 92.5384 6.68054 92.9289 7.07107C93.3195 7.46159 93.9526 7.46159 94.3431 7.07107L100.707 0.707107ZM0 1H100V-1H0V1Z" transform="translate(83 8)" fill="black"/>
		<path d="M100.707 0.707107C101.098 0.316583 101.098 -0.316583 100.707 -0.707107L94.3431 -7.07107C93.9526 -7.46159 93.3195 -7.46159 92.9289 -7.07107C92.5384 -6.68054 92.5384 -6.04738 92.9289 -5.65685L98.5858 0L92.9289 5.65685C92.5384 6.04738 92.5384 6.68054 92.9289 7.07107C93.3195 7.46159 93.9526 7.46159 94.3431 7.07107L100.707 0.707107ZM0 1H100V-1H0V1Z" transform="translate(101 8) rotate(-180)" fill="black"/>
		</svg>
  </h1>
	

	<div class="row">
		@foreach($articles as $article)
		<div class="col-lg-4">
			<a href="/projects/{{ $article->id }}"><div class="article">
				@if(isset($article->fields->Images))
				<div class="hero">
					<img src="{{ $article->fields->Images[0]->url }}">
				</div>
				@endif

				@if(isset($article->fields->Name))
				<h2>{{ $article->fields->Name }}</h2>
				@endif

				@if(isset($article->fields->Excerpt))
				<p>{{ $article->fields->Excerpt }} <span class="more">↳</span></p>
				@endif
			</div></a>
		</div>
		@endforeach
	</div>
	
</section>
@endsection