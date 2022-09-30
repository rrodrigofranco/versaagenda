@extends('adminlte::page')

@section('title', 'VersaAgenda')

@section('content_header')
@stop

@section('content')

    @php
        $user = auth()->user();
    @endphp
    <div class="container">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Inserir Tarefa</h5>
            <div class="clearfix">
                <button type="button" class="btn btn-primary float-right" onclick="location.href = location.origin + '/tarefas';"><i
                        class="fas fa-list"></i> Listar Tarefas</button>
            </div>

        </div>
        <form id="form-task" action="{{ $action ?? ''}}" method="POST">
            @csrf
            @isset($tarefa)
                @method('PUT')
            @endisset
            <div class="modal-body">

                <div class="form-group">
                    <label>Nome da Tarefa</label>
                    <input value="{{ $tarefa->nome ?? ''}}" type="text" class="form-control" id="nome" name="nome"
                        placeholder="Reunião, Almoço, Consulta, etc">
                </div>

                <div class="form-group">
                    <label>Horario</label>
                    <input value="{{ $tarefa->horario ?? ''}}" type="time" class="form-control" id="horario" name="horario">
                </div>

                <div class="form-group">
                    <label>Data</label>
                    <input value="{{ $tarefa->data ?? ''}}" type="date" class="form-control" id="data" name="data">
                </div>
                <input value="{{ $user->id }}" type="hidden" name="id_user" id="id_user">

            </div>
            <div class="modal-footer">
                <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
            </div>

        </form>

    </div>
    @if (session('erro'))
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
