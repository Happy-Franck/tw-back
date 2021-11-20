<html>
    <body>
    <div id="postuler">
        <div class="titre">
            <h1>Postuler à l'avis de recrutement</h1>
        </div>
        <div class="objet">
            <h3>Poste : {{$data['poste']}}</h3>
            <p><i>Profil :</i> {{$data['profil']}}</p>
            <p><i>Duree :</i> {{$data['duree']}}</p>
            <p><i>Technologies :</i> {{$data['technologies']}}</p>
            <div class="email">
                <strong>Mail venant de:</strong> {{$data['email']}}
            </div>
            <div class="message">
                <strong>Message:</strong> {{$data['message']}}
            </div>
        </div>

    </div>
    </div>
    </body>
</html>
