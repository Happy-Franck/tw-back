@extends('layouts.app2')
@section('content')
<div id="partenaires">
    <div class="header">
        <div id="partner">
            <div class="bef-aft" style="position: absolute; top:40%; left: 50%; transform: translate(-50%,0%);">
                <h1 class="header-h1">Partenaires</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="liste-partenaire">
            <div class="row">
                @foreach($partenaires as $partenaire)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <a href="//{{$partenaire->url}}" target="blank">
                            <div class="partenaire-item mb-4">
                                <div class="partenaire-img">
                                    <img src="{{asset('/storage/'.$partenaire->image_partenaire)}}" class="img-partenaire"/>
                                </div>
                                <br>
                                <div class="partenaire-content">
                                    <h3>{{$partenaire->nom}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
Pts.quickStart( "#partner", "#03989E" );

(function() {
  var pts = [];
  var colors = ['#9db4ff', '#aabfff', '#cad8ff', "#FFBD59"];
  space.add( {
    // init with 500 random points
    start: (bound) => { pts = Create.distributeRandom( space.innerBound, 150 ); },
    animate: (time, ftime) => {
      let r = Math.abs( space.pointer.x-space.center.x )/space.center.x * 150 + 70;
      let range = Circle.fromCenter( space.pointer, r );
      // check if each point is within circle's range
      for (let i=0, len=pts.length; i<len; i++) {
        if ( Circle.withinBound( range, pts[i] ) ) {
          // calculate circle size
          let dist = (r - pts[i].$subtract(space.pointer).magnitude() ) / r;
          let p = pts[i].$subtract( space.pointer ).scale( 1+dist ).add( space.pointer );
          form.fillOnly( colors[i%4] ).point( p, dist*25, "circle" );

        } else {
          form.fillOnly("#fff").point(pts[i], 0.5);
        }
      }
    }
  });
  space.bindMouse().bindTouch().play();
})();
</script>
@endsection
