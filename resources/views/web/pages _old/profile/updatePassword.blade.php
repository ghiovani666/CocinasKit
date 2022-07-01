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
                    <li class="active">Actualizar Password</li>
                </ol>
            </div>
            <!--/breadcrums-->
            <div class="row">
                @include('web.pages.profile.menu')
                <div class="col-md-8">
                    @if(session('msg'))
                    <div class="alert alert-info"> {{session('msg')}}</div>
                    @endif
                    <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Update your Password</h3>
                    {!! Form::open(['url' => 'updatePassword', 'method' => 'post']) !!}
                    <div class="container">
                        <div class="form-group row">
                            <div class="form-group col-md-5">
                                <label for="example-text-input">Current Password</label>
                                <input class="form-control" type="password" name="oldPassword">
                                <span style="color:red">{{ $errors->first('old_password') }}</span>
                                <br>
                                <label for="example-text-input">New Password</label>
                                <input class="form-control" type="password" name="newPassword">
                                <span style="color:red">{{ $errors->first('newPassword') }}</span>
                                <br>
                                <div align="right"> <input type="submit" value="Update Password"
                                        class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('footer_page')

@endsection