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
                    @if($message = Session::get('msg') )
                    <p class="alert alert-success">
                        {{ $message }}
                    </p>
                    @endif
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

                                @if($orders)
                                @foreach($orders['products'][0] as $order)
                                <tr>
                                    <td>{{ $order['product_name'] }}</td>
                                </tr>
                                @endforeach

                                <form action="{{ route('delete-order') }}" method="POST" class="form-group">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="orders" value="{{ json_encode($orders) }}">
                                    <button type="submit" class="btn btn-danger">Cancelar</button>
                                </form>
                                @endif
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