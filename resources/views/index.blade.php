@extends('site.layouts.layout')

@section('title', 'Bem Vindo!')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session()->get('message') }}
    </div>
@endif

    <div class="container d-flex justify-content-center mt-5 index-container">
        <div class="content d-flex justify-content-center align-items-center">
            <div class="index-text text-center">
                <h1>Bem Vindo ao meu Teste de Recrutamento</h1>
                <span><i class="fas fa-check-circle fa-5x"></i></span>
            </div>
         </div>
    </div>
@endsection
