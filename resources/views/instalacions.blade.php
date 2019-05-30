@extends('base')

@section('contingut')
<h1 class="title">INSTAL·LACIONS DEL GIMNÀS</h1>
<hr>
<br>

    <div class="row mr-2 ml-2">
        <div class="row">
            @foreach( $images as $image )
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{substr($image, 0, strrpos($image, '.'))}}"
                    data-image="\storage\images\instalacions\{{$image}}"
                    data-target="#image-gallery">
                        <img class="img-thumbnail"
                            src="\storage\images\instalacions\{{$image}}"
                            alt="imatge">
                    </a>
                </div>
            @endforeach
            <div class="modal fade " id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content light-blue lighten-5">
                        <div class="modal-header ">
                            <h4 class="modal-title titol-modal" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fas fa-window-close"></i></span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>
        
                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









@stop

@section('javascript')

<script src="/js/instalacions.js"></script>


@stop

