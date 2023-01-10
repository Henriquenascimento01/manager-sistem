@extends('layouts.app')

@section('title')
<h1>Meus pedidos</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="#">Pedidos confirmados</a>
</li>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listagem</h3>
                </div>
                <div class="card-body">
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID produto</th>
                                    <th>Nome produto</th>
                                    <th>ID usuário</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($confirmed_orders as $order)
                                <tr>
                                    <td>{{ $order->product_id }}</td>
                                    <td>{{ $order->product_name}}</td>
                                    <td>{{ $order->user_id}}</td>
                                    <td>{{ $order->quantity}}</td>

                                    <td>
                                        <a href="#" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="#" method="POST" class="form-group">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary">Bloquear</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="#" method="POST" class="form-group">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Apagar</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection