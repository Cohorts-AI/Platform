@foreach($landings as $landing)
	{{ $landing->id }}
  @if(isset($landing->fields->Heading))
		<h2>{{ $landing->fields->Heading }}</h2>
  @endif 
@endforeach	 