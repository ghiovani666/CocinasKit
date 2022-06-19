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
                    <li class="active">Mis Ordenes</li>
                </ol>
            </div>
            <!--/breadcrums-->
            <div class="row">
                @include('web.pages.profile.menu')
                <div class="col-md-10">
                    <h3 class="margin-bottom-30"><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Tus Ordenes</h3>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Codigo Pedido</th>
                                <th>Fecha</th>
                                <th>Monto Total</th>
                                <th>Status</th>
                                <th>Comprobante</th>
                                <th>Detalle del Pedido</th>
                                <th>Subir Comprobante</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>COD-{{$order->id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>€ {{$order->price}}</td>
                                <td>{{$order->state}}</td>
                                <td>Online</td>
                                <td><a target="_blank"
                                        href="https://docs.google.com/viewer?url=http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf&embedded=true">PDF</a>
                                </td>
                                <td>
                                    
                                <input type="file" />
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle del Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe width="400" height="400"
                        src="https://docs.google.com/viewer?url=http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf&embedded=true"
                        frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('footer_page')

@endsection