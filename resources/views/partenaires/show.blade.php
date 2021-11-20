@extends('layouts.app')

@section('content')
<div class="mt-5">
    <img src="{{asset('/storage/'.$partenaire->image_partenaire)}}"  class="img-fluid"/>
    {{$partenaire->nom}}<br/>
    {{$partenaire->url}}
</div>
@endsection
