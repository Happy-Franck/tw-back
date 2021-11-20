<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

    <div id="postuler">
        <div class="titre">
            <h1>Message Pour le site Tanora Web :</h1>
        </div>
        <div class="objet">
            <h3>Nom : {{$data['nom']}}</h3>
            <p><i>Prenom :</i> {{$data['prenom']}}</p>
            <p><i>email :</i> {{$data['email']}}</p>
            <p><i>objet :</i> {{$data['objet']}}</p>
            <div class="message">
                <strong>Message:</strong> {{$data['message']}}
            </div>
        </div>
    </div>

</body>
</html>
