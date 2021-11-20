<!DOCTYPE html>
<html>
<head>
    <title>Tanora Web</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/jquery-slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/pts.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light nav-custom2">
            <a class="navbar-brand" href="/">{{$user->nom_entreprise}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle liens" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                        </a>
                        <div class="dropdown-menu dr-custom" aria-labelledby="navbarDropdown">
                            @foreach($categorieServices as $service)
                                <a class="dropdown-item dropdown-item-custom" href="{{ route('service.show' , $service->id) }}">{{$service->type_service}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('partenaire.index') }}">Partenaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('recrutement.index') }}">Recrutements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('activite.index') }}">Activites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.form') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <main id="content">
        @yield('content')
    </main>
    <footer>
        <div class="footer-list">
            <div class="box">
                <ul>
                    <li><h3>Contact</h3></li>
                    <li><span><i class="fas fa-map-marker-alt"></i></span>{{$user->adresse_siege_social}}</li>
                    <li><span><i class="fas fa-envelope"></i></span>{{$user->mail_de_contact}}</li>
                    <li><span><i class="fas fa-phone-alt"></i></span>+261{{$user->telephone}}</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li><h3>Services</h3></li>
                    @foreach($categorieServices as $service)
                        <li><a href="{{ route('service.show' , $service->id) }}">{{$service->type_service}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li><h3>Technologies</h3></li>
                    @foreach($technologies as $tech)
                        <li>{{$tech->nom}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li><h3>Nous suivre</h3></li>
                    <li><a href="https://www.linkedin.com/in/tanora-web-070a8a218/" target="_blank">LinkedIn</a></li>
                    <li><a href="https://web.facebook.com/TanoraWeb-105591458293494/" target="_blank">Facebook</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-end">
            <h3>{{$user->nom_entreprise}}</h3>
            <img src="{{asset('img/logo/Tia.png')}}">
        </div>
    </footer>
    <script>
        $(function () {
            $(document).scroll(function () {
                var $nav = $(".nav-custom2");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                $nav.toggleClass('navbar-light', $(this).scrollTop() < $nav.height());
                $nav.toggleClass('navbar-dark', $(this).scrollTop() > $nav.height());
            });
        });
    </script>
</body>
</html>
