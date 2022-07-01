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
    <style>
    table td {
        padding: 10px
    }
    </style>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/profile')}}">Perfil</a></li>
                    <li class="active">Mi Dirección</li>
                </ol>
            </div>
            <!--/breadcrums-->
            <div class="row">
                @include('web.pages.profile.menu')
                <div class="col-md-8">
                    @if(session('msg'))
                    <div class="alert alert-info">
                        <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                        {{session('msg')}}
                    </div>
                    @endif
                    <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Tu dirección</h3>
                    {!! Form::open(['url' => 'updateAddress', 'method' => 'post']) !!}
                    @foreach($address_data as $value)
                    <div class="container">
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">Tu Nombre</label>
                                <input class="form-control" type="text" name="fullname" value="{{$value->fullname}}">
                                <span style="color:red">{{ $errors->first('fullname') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">Ciudad</label>
                                <input class="form-control" type="text" name="city" value="{{$value->city}}">
                                <span style="color:red">{{ $errors->first('city') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">Estado</label>
                                <input class="form-control" type="text" name="state" value="{{$value->state}}">
                                <span style="color:red">{{ $errors->first('state') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">Pincode</label>
                                <input class="form-control" type="text" name="pincode" value="{{$value->pincode}}">
                                <span style="color:red">{{ $errors->first('pincode') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">Pais</label>
                                <input class="form-control" type="text" name="country" value="{{$value->country}}">
                                <span style="color:red">{{ $errors->first('country') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-6" align="right">
                                <input class="btn btn-primary" type="submit" value="Update Address">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('footer_page')

@endsection