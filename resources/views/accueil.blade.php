@extends('layouts.app')

@section('content')
<div id="accueil">
    <div class="particules">
        <span class="rond r-blue"></span>
        <span class="rond r-red"></span>
        <span class="rond r-vert"></span>
        <span class="rond r-orange"></span>
    </div>
    <div class="container mt-5">
        <header>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="header-content">
                        <h1 class="tanora-web">{{$user->nom_entreprise}}</h1>
                        <p>{{$user->adresse_siege_social}}</p>
                        <button class="btn btn-custom-contact mb-2">
                            <a href="tel:+261{{$user->telephone}}">
                                <i class="fas fa-phone-alt"></i> +261{{$user->telephone}}
                            </a>
                        </button>
                        <button class="btn btn-custom-contact mb-2">
                            <a href="mailto:{{$user->mail_de_contact}}">
                                <i class="fas fa-envelope"></i> {{$user->mail_de_contact}}
                            </a>
                        </button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="{{asset('/storage/'.$user->logo)}}" alt="{{$user->logo}}" class="img-fluid"/>
                </div>
            </div>
        </header>
    </div>
    <div class="container">
        <div class="garantie-section my-5">
            <div class="box">
                <img src="{{asset('img/shiel green test1.png')}}" class="img-security">
                <h4>100% Satisfaction garantie</h4>
                <a href="{{ route('contact.form') }}" style="color: white;" class="btn btn-custom">Nous contacter</a>
            </div>
        </div>
    </div>
    <div class="partenaire-section my-5">
        <div class="grey-bg"></div>
        <div class="container">
            <div class="header-partenaire">
                <h1>Nos <span class="sp-blue">partenaires</span>
                </h1>
                <img src="{{asset('img/Laye.png')}}" class="img-indep">
                <a class="btn btn-custom" href="{{ route('partenaire.index') }}" style="color: white;">Voir tout</a>
            </div>
        </div>
        <div class="partenaire-carousel container">
            <div class="owl-carousel owl-theme owl-loaded">
                @foreach($partenaires as $partenaire)
                    <div class="carouse-owl-item">
                        <div class="partenaire-img">
                            <img src="{{asset('/storage/'.$partenaire->image_partenaire)}}" class="img-fluid img-carousel"/>
                        </div>
                        <h4>{{$partenaire->nom}}</h4>
                    </div>
                @endforeach
            </div>
            <div class="owl-dots">
                <div class="owl-dot active"><span></span></div>
                <div class="owl-dot"><span></span></div>
                <div class="owl-dot"><span></span></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="garantie-section my-5">
            <div class="box">
                <img src="{{asset('img/guarantee.png')}}" class="img-security">
                <h4>Deadline respecté</h4>
                <a href="{{ route('contact.form') }}" style="color: white;" class="btn btn-custom">Nous contacter</a>
            </div>
        </div>
    </div>
    <div class="services-section mb-5">
        <div class="grey-bg-service"></div>
        <div class="container">
            <div class="header-services d-flexjustify-content-between my-5">
                <h1>Nos <span class="sp-blue">services</span></h1>
                <img src="{{asset('img/Laye.png')}}" class="img-indep2">
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <a href="{{ route('service.show' , $service->id) }}" style="text-decoration: none; color: black;">
                            <div class="service-item px-3">
                                <div class="service-img mb-2">
                                    <img src="{{asset('/storage/'.$service->image_categorie_service)}}" class="img-fluid"/>
                                </div>
                                <h4>{{$service->type_service}}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
    })
</script>
@endsection
