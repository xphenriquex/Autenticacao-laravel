@extends('shared.base')
@section('content')
    <div class="panel panel-default">   
        <div class="panel-heading">Lista de Usuários</div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Login</th>
                            <th>Cargo</th>
                            @can('update', App\Usuario::class)
                                <th>Ações</th>
                            @endcan
                        </tr>
                    </thead>           
                    <tbody>           
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->nome}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->login}}</td>
                                <td>{{$usuario->cargo}}</td>
                                @can('update', App\Usuario::class)
                                    <td>
                                        <a href="{{ route('editar', $usuario->id) }}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                @endcan                               
                            </tr>                        
                        @endforeach                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection