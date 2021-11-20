@extends('layouts.app')

@section('content')
<div class="mt-5">
    <div id="recrutement-show">
        <div>
            <div class="header">
                <h1>Postuler à l'avis de recrutement</h1>
            </div>
        </div>


        <div class="container">
            <div class="recrutement-post row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                    <div class="recrutement-content">
                        <div class="recrutement-detail">
                            <div class="poste mb-2">
                                <h4>Poste :</h4>
                                {{$recrutement->poste}}
                            </div>
                            <div class="profil mb-2">
                                <h4>Profil :</h4>
                                {{$recrutement->profil}}
                            </div>
                            <div class="duree mb-2">
                                <h4>Duree :</h4>
                                {{$recrutement->duree}} mois
                            </div>
                            <div class="technologie mb-2">
                            <h4>Téchnologies :</h4>
                                <?php
                                    $myArray = explode(',', $recrutement->technologies);
                                    foreach($myArray as $i){
                                        echo "<span class='badge-custom mr-1'>".$i.'</span>';
                                    }
                                ?>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recrutement-form col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    @if (session()->has('text'))
                    <p>{{ session('text') }}</p>
                    @endif
                    <form enctype="multipart/form-data" action="{{ route('recrutement.postuler') }}" method="post">
                        <div class="form-group email">
                            <input style="display:none" name="id" value="{{$recrutement->id}}"  type="text" placeholder="email">
                            <label for="exampleInputEmail1">Adresse email :</label>
                            {{ @csrf_field() }}
                            <input class="form-control  form-bali" name="email"  aria-describedby="emailHelp"  type="email" placeholder="email">
                            {{ $errors->first('message', ":message")}}
                        </div>
                        <div class="form-group cv">
                            <label for="exampleInputEmail1">Curriculum Vitae :</label>
                            <div> <input name="cv" type="file"> </div>
                        </div>
                        <div class="form-group lm">
                            <label>Lettre de motivation :</label>
                            <div> <input name="lm" type="file"> </div>
                        </div>
                        <div class="form-group message">
                            <label>Message :</label>
                            <textarea  name="message" class="form-control  form-bali"></textarea>
                        </div>
                        <button class="btn btn-custom" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
