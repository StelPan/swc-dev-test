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
            <div class="col-lg-4">
                <h2>Все события</h2>
                <a href="{{route('events.create')}}">Создать событие</a>

                <div class="card mb-2">
                    <div class="card-header">Все события</div>
                    <ul class="list-group list-group-flush">
                        <event-list-component />
                    </ul>
                </div>

                <div class="card">
                    <div class="card-header">Мои события</div>
                    <ul class="list-group list-group-flush">
                        @foreach($events as $event)
                            @if($event->user->id === $user->id)
                                <li class="list-group-item">
                                    <a href="{{ route('events.show', ['event' => $event->id]) }}">
                                        {{$event->title}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-8"></div>
        </div>
    </div>
@endsection
