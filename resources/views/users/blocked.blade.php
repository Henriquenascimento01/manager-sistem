@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuários bloqueados</div>
                <div class="card-body">
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
                               @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('unblock-users', $user->id ) }}" accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                            {{ method_field('PUT') }}
                                            <button type="submit" class="btn btn-warning btn-sm" title="Delete User" onclick="return confirm(&quot;Deseja mesmo bloquear ?&quot;"><i class="fa fa-trash-o" aria-hidden="true"></i> Desbloquear</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection