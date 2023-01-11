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
                        @if($message = Session::get('msg') )
                        <p class="alert alert-success">
                            {{ $message }}
                        </p>
                        @endif
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
                                        <form action="{{ route('unblock-users', $user) }}" method="POST" class="form-group">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary">Desbloquear</button>
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