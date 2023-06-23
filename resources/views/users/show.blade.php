@extends('layouts.auth')

@section('title', 'Просмотр профиля')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Информация о пользователя</h1>

                <div class="profile">
                    <div class="profile-name">
                        <div class="d-flex flex-column">
                            <span>ФИО: {{ $user->name }} {{ $user->surname }}</span>
                            <span>Дата рождения: {{ $user->birthdate ?? 'Не указана' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
