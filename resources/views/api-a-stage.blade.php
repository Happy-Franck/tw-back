<html>
    <head>
    <style>
    .bali span{
        color: red;
    }
    </style>
    </head>
    <body>
    <h1>Design pour l'attestation de stage</h1>
        <div style="padding-left: 25%; padding-right: 25%;">
            <div style="margin-top: 15px; width:300px; border: 1px solid red; display:flex;">
                <div>
                    <h5 style="color:blue; border: 1px solid red; padding: 10px; border-radius: 8px;">Nom : {{$entreprise->nom_entreprise}}</span></h5>
                    <h5>Nom : {{$personnel->nom}}</span></h5>
                    <h6>{{$personnel->prenom}}</h6>
                    <h6>{{$personnel->telephone}}</h6>
                </div>
            </div>
        </div>
    </body>
</html>
