@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Cocinas Innova</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
@endsection

<!-- Contenido en el Body -->
@section('content')
<div class="container">

    <div class="card-body">

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
        @endif

        <form method="POST" action="{{url('/enviar_email_informacion')}}">

            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" placeholder="Nombre">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="txt_email" id="txt_email" class="form-control" placeholder="Email">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        <input type="text" name="txt_telefono" id="txt_telefono" class="form-control"
                            placeholder="Teléfono">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asunto:</strong>
                        <input type="text" name="txt_asunto" id="txt_asunto" class="form-control" placeholder="Asunto">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Mensaje:</strong>
                        <textarea name="txt_descripcion" id="txt_descripcion" rows="3" class="form-control"></textarea>

                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-success btn-submit">Enviar Ahora</button>
            </div>
        </form>
    </div>

</div>
@endsection

@section('footer_page')

@endsection