@extends('layouts.app2')

@section('content')
<div id="activite">
    <div class="header mb-5">
        <div id="act">
            <div class="bef-aft" style="position: absolute; top:40%; left: 50%; transform: translate(-50%,0%);">
                <h1 class="header-h1">Activités</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="liste-activite mb-5">
            <div class="row">
                @foreach($activites as $activite)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-5">
                        <div class="activite-item">
                            <div class="activite-image">
                                <img src="{{asset('/storage/'.$activite->image_activite)}}" class="img-fluid"/>
                            </div>
                            <div class="activite-content">
                                <h4>{{$activite->titre}}</h4>
                                <p>
                                    <?php
                                        if(strlen($activite->description) < 80){
                                            echo '<p>'.$activite->description.'</p>';
                                        }
                                        else{
                                            $new = wordwrap($activite->description, 80);
                                            $new = explode("\n", $new);
                                            $new = $new[0] . '...';
                                            echo '<p>'.$new.'</p>';
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="activite-action">
                                <a class="btn btn-custom" href="{{route('activite.show' , $activite->id)}}">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>

// Source code licensed under Apache License 2.0.
// Copyright © 2017 William Ngan. (https://github.com/williamngan/pts)

Pts.quickStart( "#act", "#03989E" );
(function() {
  var lines = [];
  var createLines = () => {
    lines = [];
    var ps = Create.distributeRandom( space.innerBound, 50 );
    for (let i=0, len=ps.length; i<len; i++) {
      lines.push( new Group( ps[i], ps[i].clone().toAngle( Math.random()*Const.pi, Math.random()*space.size.y/2+20, true) ) );
    }
  };
  space.add( {
    start: (bound) => { createLines(); },
    resize: (bound) => { createLines(); },
    animate: (time, ftime) => {
      let range = Circle.fromCenter( space.pointer, 100 );
      form.stroke( "#fff" ).lines( lines );
      for (let i=0, len=lines.length; i<len; i++) {
        let inPath = Circle.intersectRay2D( range, lines[i] );
        let inLine = Circle.intersectLine2D( range, lines[i] );
        if (inPath.length > 1) {
          form.stroke("rgba(255,255,255,.15)").line( lines[i].concat(inPath[0], inPath[1]) );
          form.stroke("#aabfff").line( lines[i] );
          form.fillOnly("#fff").points( inPath, 1, "circle" );
        }
        if (inLine.length > 0) {
          form.stroke("#FFBD59").line( lines[i] );
          form.fillOnly("black").points( inLine, 3, "circle" );
        }
      }
    }
  });
  space.bindMouse().bindTouch().play();
})();

</script>
@endsection
