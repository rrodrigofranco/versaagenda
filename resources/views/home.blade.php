@extends('adminlte::page')

@section('title', 'VersaAgenda')

@section('content_header')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ count($tarefas) }}</h3>
                    <p>Total de Tarefas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="./tarefas" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ count($pendentes) }}</h3>
                    <p>Tarefas Pendentes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/tarefas/pendentes" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix">
        <button type="button" class="btn btn-primary float-right" onclick="window.location='{{ url("adicionar") }}'"><i
                class="fas fa-plus"></i> Adicionar tarefa</button>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
