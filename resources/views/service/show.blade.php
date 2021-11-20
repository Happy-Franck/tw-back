@extends('layouts.app2')
@section('content')
<div id="service">
    <div class="header">
        <div id="serv">
            <div class="bef-aft" style="position: absolute; top:40%; left: 50%; transform: translate(-50%,0%);">
                <h1>{{$categorieService->type_service}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 mb-5">
                <div class="service-list row">
                    @foreach($services as $service)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                            <div onclick="activer(this)" class="service-item collapsed" data-toggle="collapse" data-target="#collapse{{$service->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="service-img">
                                    <img src="{{asset('/storage/'.$service->image_service)}}" class="img-fluid"/>
                                </div>
                                <div class="service-titre" id="heading{{$service->id}}">
                                    <h5 class="mb-0">
                                        {{$service->nom}}
                                    </h5>
                                    <button class="btn btn-collapse collapsed" data-toggle="collapse" data-target="#collapse{{$service->id}}" aria-expanded="false" id="btn-collapse" aria-controls="collapseTwo">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="service-description collapse" id="collapse{{$service->id}}" aria-labelledby="heading{{$service->id}}" data-parent="#accordion">
                                    <div class="card-body">
                                        {{$service->description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 techno px-5 mb-5">
                <h2>Technologies</h2>
                <div class="techno-list">
                    @foreach($technologies as $technologie)
                        <div class="techno-item">
                            <div class="techno-content">
                                <img src="{{asset('/storage/'.$technologie->image_technologie)}}" width="100px" class="img-fluid"/>
                                <span class="nomtech">
                                    {{$technologie->nom}}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    Pts.quickStart( "#serv", "#03989E" );

//// Demo code starts (anonymous function wrapper is optional) ---

(function() {

  let pts = new Group();

  // Confetti extends Pt to implement custom logic and rendering
  class Confetti extends Pt {
    constructor( ...args ) {
      super( ...args );
      this.color = ['#9db4ff', '#aabfff', '#cad8ff', "#FFBD59"][ Util.randomInt(4) ];
      this.size = Math.random()*7+2;
      this.angle = Math.random() * Const.two_pi;
      this.dir = (Math.random() > 0.5) ? 1 : -1;
      this.shape = ["rect", "circle", "tri"][ Util.randomInt(3) ];
    }

    render( form ) {
      if (this.y < space.size.y) {
        this.y += 2/this.size + Math.random();
        this.x += Math.random() - Math.random();
        this.angle += this.dir * (Math.random()*Const.one_degree + Const.one_degree);

        if (this.shape == "tri" || this.shape == "rect") {
          let shape = (this.shape == "tri") ? Triangle.fromCenter(this, this.size) : Rectangle.corners(Rectangle.fromCenter(this, this.size*2));
          shape.rotate2D( this.angle, this );
          form.fillOnly(this.color).polygon( shape );
        } else {
          form.fillOnly(this.color).point( this, this.size, "circle" );
        }
      }
    }
  }


  space.add({
    animate: (time, ftime) => {
      // remove confetti if reaching the bottom or too many
      if (pts.length > 1000 || (pts.length > 0 && pts[0].y > space.size.y)) pts.shift();

      // add a confetti every second
      if ( Math.floor(time%1000) > 980 ) pts.push( new Confetti(space.pointer) );

      // render the confetti
      pts.forEach( p => p.render(form) );
    },

    action:( type, px, py ) => {

      // add a point to the line when mouse moves
      if (type == "move") pts.push( new Confetti(px, py) );
    }
  });

  //// ----


  space.bindMouse().bindTouch().play();

})();
</script>
@endsection
