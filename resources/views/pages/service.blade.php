@extends('layouts.app')
@section('content')
<h1>{{$title}}</h1>
@if(count($services)>0)
<ul class="list-group">
@foreach ($services as $service)
<li class="list-group-item">{{$service}}</li>
@endforeach    
</ul>
@endif        
@endsection 

<div class="row">
    <div class="col-6">dd</div>
    <div class="col-6">s</div>
</div>
        
