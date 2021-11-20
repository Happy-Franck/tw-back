@extends('layouts.app')

@section('content')


<div class="mt-5">
    <div id="contact">
        <div class="header">
            <h1>Contact</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="img-box" style="height:60%;">
                        <img src="{{asset('img/undraw_Personal_email_re_4lx7.svg')}}" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <div class="formulaire">
                        <div class="container">
                            <form action="{{route('contact.post')}}" method="post">
                                @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Nom complet: </label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control form-bali" name="nom" id="mame" type="text" placeholder="nom">
                                        </div>
                                        <div class=col-6>
                                            <input class="form-control form-bali" name="prenom" id="prenom" type="text" placeholder="prénom">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mail">Adresse email</label>
                                    <div>
                                        <input class="form-control form-bali" name="email" id="mail" type="email" placeholder="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="objet">Objet</label>
                                    <div>
                                        <input class="form-control form-bali" id="objet" name="objet" type="objet" placeholder="objet">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="msg">Message</label>
                                    <div>
                                        <textarea class="form-control form-bali" name="message" id="msg"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-custom" type="submit">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
