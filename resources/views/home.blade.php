@extends('base')

@section('contingut')

<h1 class="title">INICI</h1>


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
                <h3>Benvinguts al Gimnàs Palace!</h3>
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

<!-- Section: Testimonials v.2 -->
<section class="text-center my-5">
  <div class="wrapper-carousel-fix">
    <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
      data-interval="false">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="testimonial">
            <div class="avatar mx-auto mb-4">
              <img src="/storage/images/logo.png" class="rounded-circle img-fluid"
                alt="Logo">
            </div>
            <h4>
              <i class="fas fa-quote-left"></i> Benvinguts a la web del gimnàs Palace! Aquí podreu trobar tota la informació necessària per conèixer 
              tot un ventall de serveis i noves activitats que us oferim. Presentem una alternativa moderna al gimnàs clàssic basada en una atenció 
              i un entrenament personalitzat per part dels nostres monitors. Les nostres activitats van des del manteniment, funky, aerobox, aquagym… fins al Pilates.
              <i class="fas fa-quote-right"></i>
            </h4>
            <h3 class="font-weight-bold">Gimnàs Palace</h3>
            <h6 class="font-weight-bold my-3">L'equip directiu</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  </section>
@stop