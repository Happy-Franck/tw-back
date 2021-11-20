@extends('layouts.app')

@section('content')
<div id="activiteshow" class="mt-5">
    <div class="container">
        <div class="breadcumb-liste">
            <ul class="breadcrumb-custom">
              <li class="breadcrumb-c-item"><a href="/">Imagino</a></li>
              <li class="breadcrumb-c-item"><a href="{{ route('activite.index') }}">Activités</a></li>
              <li class="breadcrumb-c-item active" aria-current="page">{{$activite->titre}}</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="image">
                    <img src="{{asset('/storage/'.$activite->image_activite)}}"  class="img-fluid"/>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="activite-content">
                    <h2>{{$activite->titre}}</h2>
                    <p>{{$activite->description}}</p>
                    <p class="lieu">{{$activite->lieu}}</p>
                    <span class="badge-date">{{$activite->date}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
