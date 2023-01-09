@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuários</div>
                <div class="card-body">
                    <a href="{{ url('/users/create') }}" class="btn btn-success btn-sm" title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> Criar novo
                    </a>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Detalhes</button></a>
                                        <a href="{{ url('/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                        <form method="POST" action="{{ url('/users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Deseja mesmo apagar ?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                                        </form>
                                        <form method="POST" action="{{ url('/users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-warning btn-sm" title="Delete User" onclick="return confirm(&quot;Deseja mesmo bloquear ?&quot;"><i class="fa fa-trash-o" aria-hidden="true"></i> Bloquear</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection