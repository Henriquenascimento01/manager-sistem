@extends('layouts.app')

@section('title')
<h1>Dashboard</h1>
@endsection


@section('content')
<div class="container">
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
                    @can('is_admin')
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
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection