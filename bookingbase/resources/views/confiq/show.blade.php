<style>
      .room-span--whiteboard {
            content: "";
            background-color: #933299;
            width: 10px;
            height: 10px;
            display: inline-block;
            margin-right: 5px;
            border-radius: 50%;
      }
      .room-span--table {
            content: "";
            background-color: #eee;
            width: 10px;
            height: 10px;
            display: inline-block;
            margin-right: 5px;
            border-radius: 50%;
      }
      .room-span--chair {
            content: "";
            background-color: #535353;
            width: 10px;
            height: 10px;
            display: inline-block;
            margin-right: 5px;
            border-radius: 50%;
      }
      .room-infobox {
            max-height: 200px;
      }
</style>
@extends('layout')

@section('titel', 'Show confiq')

@section('js')
      {{-- <script src="{{ URL::asset('js/scheme.js') }}" charset="utf-8"></script> --}}
@stop

@section('content')
  <div>
        @php
              $canvasWidth = 500;
              $canvasHeight = 600;
        @endphp
        <div class="container">
              <div class="row">
                    <div class="col-lg-6 offset-lg-3 mt-5">
                          @foreach ($confiq as $conf)
                          @endforeach
                          <h1 class=" text-secondary">Room <?php echo $conf->room_id; ?></h1>
                          <canvas id="canvas" width=<?php echo $canvasWidth; ?> height=<?php echo $canvasHeight; ?> style="border:1px solid #000000;">
                         </canvas>
                         <p class="mt-2">Please configure your room here!</p>
                    </div>
                    <div class="col-lg-3 mt-5 bg-light p-4 room-infobox">
                          <p><span class="room-span--table"></span>Student Table</p>
                          <p><span class="room-span--chair"></span>Student Chair</p>
                          <p><span class="room-span--whiteboard"></span>Whiteboard</p>
                    </div>
              </div>
        </div>
        @foreach($confiq as $conf)
            {{-- <h3>{{ $conf->id }}</h3>
            <h1>Hello</h1> --}}
        @endforeach
  </div>

  @php
        $confiq_json = [];
  @endphp

  @foreach ($confiq as $conf)
        @php
              array_push($confiq_json, $conf)
        @endphp
  @endforeach

  <script type="text/javascript">

      // Get canvas related references
      var canvas=document.getElementById("canvas");
      var ctx=canvas.getContext("2d");
      var BB=canvas.getBoundingClientRect();

      var offsetX=BB.left;
      var offsetY=BB.top;
      var WIDTH = canvas.width;
      var HEIGHT = canvas.height;

      // Drag related variables
      var dragok = false;
      var startX;
      var startY;

      // an array of objects that define different shapes
      var d1 = <?php echo json_encode($confiq_json, JSON_PRETTY_PRINT) ?>;
      var shapes=[];
      var fillcolor = "#eee";
      console.log(d1);
      var d1Length = d1.length;

      for (var i = 0; i < d1Length; i++) {
            var shapeX = d1[i].place_x;
            var shapeY = d1[i].place_y;
            var shapeWidth = d1[i].width;
            var shapeHeight = d1[i].height;
            var shapeRotation = d1[i].rotation;
            var shapeFurniture = d1[i].furniture;

            var shapeXINT = parseInt(shapeX, 10);
            var shapeYINT = parseInt(shapeY, 10);
            var shapeWidthINT = parseInt(shapeWidth, 10);
            var shapeHeightINT = parseInt(shapeHeight, 10);

            if (shapeRotation == 'HT' && shapeFurniture == 'ST') {
                  shapes.push({x:shapeXINT,y:shapeYINT,width:90,height:60,fill:fillcolor,isDragging:false});
            }
            if (shapeRotation == 'VT' && shapeFurniture == 'ST') {
                  shapes.push({x:shapeXINT,y:shapeYINT,width:60,height:90,fill:fillcolor,isDragging:false});
            }
            if (shapeFurniture == 'SC') {
                  shapes.push({x:shapeXINT,y:shapeYINT,r:12,fill:"#535353",isDragging:false});
            }
            if (shapeRotation == 'HT' && shapeFurniture == 'WB') {
                  shapes.push({x:shapeXINT,y:shapeYINT,width:250,height:10,fill:"#933299",isDragging:false});
            } else if (shapeRotation == 'VT' && shapeFurniture == 'WB') {
                  shapes.push({x:shapeXINT,y:shapeYINT,width:10,height:250,fill:"#933299",isDragging:false});
            }
      }

      // --- TABLES
      // define hori rectangles (tables)
      // shapes.push({x:155,y:100,width:90,height:60,fill:"#a4a5a4",isDragging:false});

      // define vert rectangles (tables)
      // shapes.push({x:360,y:100,width:60,height:90,fill:"#a4a5a4",isDragging:false});

      // --- CHAIRS
      // define circles (chairs)

      // listen for mouse events
      canvas.onmousedown = myDown;
      canvas.onmouseup = myUp;
      canvas.onmousemove = myMove;

      // call to draw the scene
      draw();

      // draw a single rect
      function rect(r) {
            ctx.fillStyle=r.fill;
            ctx.fillRect(r.x,r.y,r.width,r.height);
      }

      // draw a single rect
      function circle(c) {
            ctx.fillStyle=c.fill;
            ctx.beginPath();
            ctx.arc(c.x,c.y,c.r,0,Math.PI*2);
            ctx.closePath();
            ctx.fill();
      }

      // clear the canvas
      function clear() {
            ctx.clearRect(0, 0, WIDTH, HEIGHT);
      }

      // redraw the scene
      function draw() {
            clear();
            // redraw each shape in the shapes[] array
            for(var i=0;i<shapes.length;i++){
                  // decide if the shape is a rect or circle
                  // (it's a rect if it has a width property)
                  if(shapes[i].width){
                        rect(shapes[i]);
                  } else{
                        circle(shapes[i]);
                  };
            }
      }

      // handle mousedown events
      function myDown(e){
            // tell the browser we're handling this mouse event
            e.preventDefault();
            e.stopPropagation();

            // get the current mouse position
            var mx=parseInt(e.clientX-offsetX);
            var my=parseInt(e.clientY-offsetY);

            // test each shape to see if mouse is inside
            dragok=false;
            for(var i=0;i<shapes.length;i++){
                  var s=shapes[i];
                  // decide if the shape is a rect or circle
                  if(s.width){
                  // test if the mouse is inside this rect
                        if(mx>s.x && mx<s.x+s.width && my>s.y && my<s.y+s.height){
                        // if yes, set that rects isDragging=true
                        dragok=true;
                        s.isDragging=true;
                        }
                  } else {
                        var dx=s.x-mx;
                        var dy=s.y-my;
                        // test if the mouse is inside this circle
                        if(dx*dx+dy*dy<s.r*s.r){
                        dragok=true;
                        s.isDragging=true;
                        }
                  }
            }
            // save the current mouse position
            startX=mx;
            startY=my;
      }

      // handle mouseup events
      function myUp(e){
            // tell the browser we're handling this mouse event
            e.preventDefault();
            e.stopPropagation();

            // clear all the dragging flags
            dragok = false;
            for(var i=0;i<shapes.length;i++){
                  shapes[i].isDragging=false;
            }
      }

      // handle mouse moves
      function myMove(e){
            // if we're dragging anything...
            if (dragok){
                  // tell the browser we're handling this mouse event
                  e.preventDefault();
                  e.stopPropagation();

                  // get the current mouse position
                  var mx=parseInt(e.clientX-offsetX);
                  var my=parseInt(e.clientY-offsetY);

                  // calculate the distance the mouse has moved
                  // since the last mousemove
                  var dx=mx-startX;
                  var dy=my-startY;

                  // move each rect that isDragging
                  // by the distance the mouse has moved
                  // since the last mousemove
                  for(var i=0;i<shapes.length;i++){
                        var s=shapes[i];
                              if(s.isDragging){
                              s.x+=dx;
                              s.y+=dy;
                        }
                  }

                  // redraw the scene with the new rect positions
                  draw();

                  // reset the starting mouse position for the next mousemove
                  startX=mx;
                  startY=my;
            }
      }

      </script>

@endsection
