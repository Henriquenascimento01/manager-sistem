@extends('layouts.app')

@section('content')
<div class="container">
    @can('is_admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Painel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $quantity_products}}</h3>
                            <p>Produtos em estoque</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $quantity_orders}}</h3>
                            <p>Quantidade de pedidos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$quantity_users}}</h3>

                            <p>Usuários registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Ranking dos 5 usuários que mais realizaram pedidos</p>
                    @foreach($requests_by_users as $users_orders)
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="jsgrid-row">
                                <td class="jsgrid-cell" style="width: 150px;">{{ $users_orders['name'] }}</td>
                                <td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">{{$users_orders['quantity'] }}</td>
                                </td>
                        </tbody>
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endcan
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Seja bem vindo, utilize os menus laterais para navegação</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection