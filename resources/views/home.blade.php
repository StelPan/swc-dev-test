@extends('layouts.auth')

@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Главная страница</h1>
            </div>
        </div>
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    {{session('success')}}
                </div>
            @endif
        </div>
    </div>
@endsection
