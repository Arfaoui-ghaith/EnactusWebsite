@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h2 class="text-white text-center">{{ __('Welcome to Enactus Iset Charguia Back Office Website.') }}</h2>
      </div>
      <div id="#div">

    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 207 208" xml:space="preserve">
<style type="text/css">
#div{
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}
svg{
  position: absolute;
  z-index: 9999;
  top: -300px;
  left: 0;
  -webkit-transform: scale(0.3)
}
.st0{
  fill: transparent;
  stroke:#FFC122;
  stroke-width:1;
  stroke-dasharray: 650px;
  stroke-dashoffset: 650px;
  animation: out 8s ;
  animation-fill-mode: both;
}
.st1{
  fill:#C78A2B;
  opacity: 0;
  animation: show 1s ease both;
  animation-delay: 6s;
}
.st2{
  fill:#C78A2B;
  opacity: 0;
  animation: show 1s ease both;
  animation-delay: 6s;
}


@keyframes out{
  0%{
    stroke-dashoffset:650px;
  }
  70%{
    fill: transparent;
    stroke-width:1;
  }
  100%{
    stroke-dashoffset:0px;
    fill:#FFC122;
    stroke-width:0;
  }
}

@keyframes show{
  0%{
    opacity: 0;
  }
  100%{
    opacity: 1;
  }
}

</style>
<g id="XMLID_21_">
	<polygon id="XMLID_23_" class="st0" points="201.1,133.5 162.4,94.8 75.7,8.1 75.7,133.5 6.3,133.5 75.7,202.9 145,133.5 	"/>
	<polygon id="XMLID_22_" class="st1" points="75.7,202.9 75.7,133.5 67.9,133.5 	"/>
	<polygon id="XMLID_46_" class="st2" points="173,105.3 145,133.5 153.6,133.5 	"/>
</g>
</svg>


  </div>

  </div>
</div>
@endsection
