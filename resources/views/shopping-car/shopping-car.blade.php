@extends('layouts.app')

@section('title')
<h1>Meus produtos</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="#">Resumo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Meus produtos</h3>
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
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>

                            <tbody>
                                <form action="{{ route('confirmed-order') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $items }}" name="order">
                                    <button class="btn btn-success">Confirmar pedido</button>
                                </form>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td><input style="width: 100px " type="number" class="form-control" name="quantity" value="{{ $item->quantity }}"></td>
                                    <form action="{{ route('remove-items')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <td><button class="btn btn-danger">Remover</button></td>
                                    </form>
                                    <td></td>
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