@extends('base')

@section('contingut')

<!-- Section: Contact v.1 -->
<section class="my-5">

        <!-- Section heading -->
        <h1 class="text-center my-5 title">CONTACTAN'S</h1>  
        <hr>
        <br>    
        <!-- Grid row -->
        <div class="row">
      
          <!-- Grid column -->
          <div class="col-lg-5 mb-lg-0 mb-4">
      
            <!-- Form with header -->
            <div class="card">
              <div class="card-body">
                <!-- Header -->
                <div class="form-header contacta-color">
                  <h3 class="mt-2"><i class="fas fa-envelope"></i> Escriu-nos:</h3>
                </div>
                <p class="dark-grey-text">La teva opinió ens ajuda a millorar el nostre servei</p>
                <!-- Body -->
                <div class="md-form">
                  <i class="fas fa-user prefix grey-text"></i>
                  <input type="text" id="form-name" class="form-control">
                  <label for="form-name">El teu nom</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="text" id="form-email" class="form-control">
                  <label for="form-email">El teu Correu</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-tag prefix grey-text"></i>
                  <input type="text" id="form-Subject" class="form-control">
                  <label for="form-Subject">Assumpte</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-pencil-alt prefix grey-text"></i>
                  <textarea id="form-text" class="form-control md-textarea" rows="3"></textarea>
                  <label for="form-text">Missatge</label>
                </div>
                <div class="text-center">
                  <button class="btn btn-light-blue">Enviar</button>
                </div>
              </div>
            </div>
            <!-- Form with header -->
      
          </div>
          <!-- Grid column -->
      
          <!-- Grid column -->
          <div class="col-lg-7">
      
            <!--Google map-->
            <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
              <iframe src="https://maps.google.com/maps?q=gimnas%20palace&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0" allowfullscreen></iframe>
            </div>
            <!-- Buttons-->
            <div class="row text-center">
              <div class="col-md-3">
                <a class="btn-floating color-footer">
                  <i class="fas fa-map-marker-alt"></i>
                </a>
                <p>C/ Sant Pere, 5 17762</p>
                <p class="mb-md-0">Figueres</p>
              </div>
              <div class="col-md-3">
                <a class="btn-floating color-footer">
                  <i class="fas fa-phone"></i>
                </a>
                <p>972 524 552</p>
              </div>
              <div class="col-md-3">
                <a class="btn-floating color-footer">
                  <i class="fas fa-envelope"></i>
                </a>
                <p>info@gimnaspalace.me</p>
                
              </div>
              <div class="col-md-3">
                    <a class="btn-floating color-footer">
                        <i class="far fa-calendar-alt"></i>
                    </a>
                    <p>HORARI: DILL - DIV 7AM - 22.30PM, DISS - 9AM - 14PM, DIU - TANCAT</p>
                    
                  </div>
            </div>
      
          </div>
          <!-- Grid column -->
      
        </div>
        <!-- Grid row -->
      
      </section>
      <!-- Section: Contact v.1 -->


@stop