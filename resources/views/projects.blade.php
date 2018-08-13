@extends('layouts.main')

@section('content')
<section class="articles projects">

	<div class="row">
		@foreach($articles as $article)
			@if(isset($article->fields->Name))

				@if(isset($article->fields->Name))
				<h1><a href="/projects/{{ $article->id }}">{{ $article->fields->Name }}</a></h1>
				@endif

			@endif
		@endforeach
	</div>
	
	<div class="project_modal">
		<div class="modal_wrapper">
			<h2>PROJECT NAME</h2>
			<div class="modal_content">
				
			</div>
		</div>
	</div>
	
</section>
@endsection