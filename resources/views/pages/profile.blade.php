@extends('adminlte::page')

@section('title', 'VersaAgenda')

@section('content_header')
@stop

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form-perfil"  action="{{ $action ?? ''}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome</label>
                            <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="nome" placeholder="Nome">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input value="{{$user->email }}" type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
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
