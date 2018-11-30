@extends('landingpages.layout')

@section('content')
<div class="landing_wrapper {{ $landing->class }}" style="background: url({{ $landing->fields->Background[0]->url }})">
	<h1 alt="{{ $landing->fields->Title }}"><img src="{{ $landing->fields->Logo[0]->url }}"></h1>
  <h2>{{ $landing->fields->Heading }}</h2>
</div>
@endsection