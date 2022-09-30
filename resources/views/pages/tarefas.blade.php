@extends('adminlte::page')

@section('title', 'VersaAgenda')

@section('content_header')
@stop

@section('content')

    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tarefas as $tarefa)
                            <tr>
                                <th scope="row">{{ $tarefa->id }} </th>
                                <td>{{ $tarefa->nome }}</td>
                                <td>{{ $tarefa->horario }}</td>
                                <td>{{ date('d/m/Y', strtotime($tarefa->data)) }}</td>
                                <td>
                                    <a href="{{ route('tarefas.formEditar', $tarefa->id) }}">
                                        <span>
                                            <i class='far fa-edit text-primary mr-1'></i>
                                        </span>
                                    </a>
                                    <form action="{{ route('tarefas.deletar', $tarefa->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button style="border:0; background:transparent;" type="submit">
                                            <span style="cursor=pointer;">
                                                <i class='fas fa-trash text-danger mr-1'></i>
                                            </span>
                                        </button>
                                    </form>

                                    <!-- <a href="index.php?pag=&funcao=presenca&id_aluno=&id_aula=&id= ?>" title='Deletar'><i class='fas fa-trash'></i></a> -->
                                </td>
                            @empty
                                <h2>Não existem tarefas marcadas</h2>
                        @endforelse


                    <tfoot>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            <button type="button" class="btn btn-primary float-right" onclick="window.location='{{ url('adicionar') }}'"><i
                    class="fas fa-plus"></i> Adicionar tarefa</button>
        </div>

        @if (session('sucesso'))
            <div style="text-align: center; color: green;">
                {{ session('sucesso') }}
            </div>
        @elseif (session('erro'))
            <div style="text-align: center; color: red;">
                {{ session('erro') }}
            </div>
        @endif
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')

    @stop
