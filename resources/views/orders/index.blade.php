@extends('layouts.app')

@section('title')
<h1>Meus pedidos</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mt-2">Lista de pedidos</h3>
                </div>
                <div class="card-body">
                    @if($message = Session::get('msg') )
                    <p class="alert alert-success">
                        {{ $message }}
                    </p>
                    @endif

                    <div class="card-body">
                        @if($orders)
                        <form action="{{ route('delete-order') }}" method="POST" class="form-group mt-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="orders" value="{{ json_encode($orders) }}">
                            <button type="submit" class="btn btn-danger">Cancelar pedido</button>
                        </form>
                        @foreach($orders['products'][0] as $order)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">Número pedido</th>
                                    <th>Nome produto</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order['order_id'] }}</td>
                                    <td>{{ $order['product_name'] }}</td>
                                    <td>{{ $order['quantity'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="card-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection