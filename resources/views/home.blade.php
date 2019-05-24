@extends('base')

@section('contingut')

<h1>INICI</h1>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
 
    <ol class="carousel-indicators">
     @foreach( $images as $image )
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
     @endforeach
    </ol>
   
    <div class="carousel-inner" role="listbox">
      @foreach( $images as $image )
         <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
             <img class="d-block img-fluid" src="\storage\images\slider\{{$image}}" alt="">
                <div class="carousel-caption d-none d-md-block">
                   <h3>obeweffee</h3>
                   <p>lkednojewnoidfnboiewbnoiewfbenio</p>
                </div>
         </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Següent</span>
    </a>
  </div>

















@stop