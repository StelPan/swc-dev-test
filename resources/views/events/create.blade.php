@extends('layouts.auth')

@section('title', 'Создание события')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('events.store') }}" method="post">
                @method('post')

                @csrf

                <div class="card">
                    <div class="card-header">
                        Создание события
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Заголовок события</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание события</label>
                            <textarea id="description" name="description" required class="form-control"></textarea>
                        </div>

                        <button class="btn btn-success mt-2" type="submit">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
