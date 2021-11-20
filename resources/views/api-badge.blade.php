<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <style>
            @page { margin: 0px; }
            body { margin: 0px; }
            .entreprise{
                background: #03989E;
                padding-top: 10px;
                padding-bottom: 10px;
            }
            .entreprise h2{
                color: white;
                padding-left: 20px;
            }
            .informations{
                display: flex;
            }
            .photo{
                margin-left: 10px;
                margin-top: 15px;
                width: 114px;
                height: 152px;
                border: 3px solid grey;
            }
            .info{
                margin-left: 150px;
                margin-top: -250px;
            }
            .info span{
                display: block;
                line-height: 30px;
            }
        </style>
    </head>
    <body>
        <div class="badge">
            <div class="entreprise">
                <h2>{{$entreprise->nom_entreprise}}</h2>
            </div>
            <br>
            <div class="informations">
                <div class="photo"></div>
                <div class="info">
                    <span><strong>Nom :</strong> {{$personnel->nom}}</span>
                    <span><strong>Prénom :</strong> {{$personnel->prenom}}</span>
                    <span><strong>Poste :</strong> {{$personnel->poste}}</span>
                    <span><strong>Téléphone :</strong> +261{{$personnel->telephone}}</span>
                </div>
            </div>
    </body>
</html>
