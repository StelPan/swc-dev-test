@extends('layouts.auth')

@section('title', 'Просмотр события')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="event">
                    <div class="event-header">
                        <div class="d-flex flex-column">
                            <h1>{{ $event->title }}</h1>
                            <span>Описание: {{ $event->description }}</span>
                            <span>Дата создания: {{ $event->created_at}}</span>
                        </div>
                    </div>

                    <div class="event-body">
                        <h2>Участники</h2>

                        <ul>
                            <li>
                                <a href="{{ route('users.show', ['user' => $event->user->id]) }}">
                                    Создатель события: {{ $event->user->name }} {{ $event->user->surname }}
                                </a>
                            </li>
                            <member-list-component :event-id="{{$event->id}}" />
                        </ul>
                    </div>

                    @php
                        $exist = $event->users->first(function ($value) { return $value->id === Auth::user()->id; });
                    @endphp

                    <form action="{{ route('events.keep', ['id' => $event->id]) }}" method="post">
                        @csrf
                        @method('post')

                        @if(!$exist && ($event->user->id !== Auth::user()->id ))
                            <button class="btn btn-success" type="submit">Принять участие</button>
                        @endif
                    </form>

                    <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        @if ($event->user->id === Auth::user()->id)
                            <button class="btn btn-danger" type="submit">Отказаться от участия</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
