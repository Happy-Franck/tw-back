@extends('layouts.app2')
@section('content')
    <div id="recrutement">
        <div class="header">
            <div id="space">
                <div class="bef-aft" style="position: absolute; top:40%; left: 50%; transform: translate(-50%,0%);">
                    <h1 class="header-h1">Avis de recrutements</h1>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            @if ($message = Session::get('okok'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="liste-avis">
                @foreach($recrutements as $recrutement)
                <div class="avis mb-5">
                    <div class="recrute avis-image">
                        <img src="{{asset('/storage/'.$recrutement->image_recrutement)}}" class="monimage"/>
                    </div>
                    <div class="recrute avis-content my-3">
                        <div class="avis-content-poste"> <h2>   {{$recrutement->poste}} </h2></div>
                        <?php
                            if(strlen($recrutement->profil) < 80){
                                echo '<p>'.$recrutement->profil.'</p>';
                            }
                            else{
                                $new = wordwrap($recrutement->profil, 80);
                                $new = explode("\n", $new);
                                $new = $new[0] . '...';
                                echo '<p>'.$new.'</p>';
                            }
                        ?>
                        <p class="avis-content-duree"><strong>Duree :</strong>
                            @if(($recrutement->duree) < 25)
                                {{$recrutement->duree}} mois
                            @else
                                CDI
                            @endif
                        </p>
                        <div>
                            <p><strong>Téchnologies :</strong></p>
                            <div style="display:flex; flex-wrap: wrap;">
                                <?php
                                    $myArray = explode(',', $recrutement->technologies);
                                    foreach($myArray as $i){
                                        echo "<span class='badge-custom mt-1 mr-1'>".$i.'</span>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="recrute avis-postuler">
                        <a href="{{route('recrutement.show' , $recrutement->id)}}"><button class="btn btn-custom">postuler</button></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<script>
    (function() {
        Pts.namespace(window);
        var space = new CanvasSpace('#space').setup({
            bgcolor: '#03989E',
            resize: true,
            retina: true
        });
        let randomIntFromInterval = function(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }
        colors = ['#9db4ff', '#aabfff', '#cad8ff', '#fff9f9', '#fff1df', '#ffc690', '#ffbb7b'];
        var form = space.getForm();
        var pts = [];
        const dotsBg = 'rgba(255,255,255,0.7)';
        const dotsBgActive = '#FFBD59';
        const radius = Math.floor(Math.random() * (150 - 90) + 90);
        var pickArray = function(arr, coord, radius) {
            let arrayCoords = [];
            arr.forEach(function(item) {
                if ((item[0] >= (coord[0] - radius) && item[0] <= (coord[0] + radius)) &&
                    (item[1] >= (coord[1] - radius) && item[1] <= (coord[1] + radius))) {
                    arrayCoords.push(item);
                }
            })
            return arrayCoords;
        }
        space.add({
            start: (bound, space) => {
                pts = Create.distributeRandom(space.innerBound, 100);
            },
            animate: (time, ftime) => {
                pts.forEach((p, i) => {
                    form.fillOnly(colors[i % colors.length], 1)
                    let newX = p[0] + randomIntFromInterval(-20, 20) * 0.01
                    let newY = p[1] + randomIntFromInterval(-20, 20) * 0.01
                    let newPoints = [newX, newY];
                    form.point(p, 2 - 2 * i / pts.length, 'circle');
                    pts[i] = newPoints
                })
                let surface = pickArray(pts, space.pointer, radius);
                let curve = Polygon.convexHull(surface);
                curve.insert(curve, curve.lenght)
                form.strokeOnly('rgba(255,255,255,0.1)', 1).line(curve)
                // Lines
                let lines = surface.map((p) => [p, space.pointer]);
                form.strokeOnly('rgba(255,255,255,0.1)', 1).lines(lines);
                form.fillOnly(dotsBgActive).points(surface, 2, 'circle');;
            },
        });
        space.bindMouse().bindTouch().play();
    })();
</script>
@endsection
