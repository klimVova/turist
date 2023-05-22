@extends('user.layouts.main')
@section('content')
    <div class="container-fluid main content">
        <div class="office">
            <div class="section-label">
                <h2>Личный кабинет</h2>
                <hr>
            </div>
            <h2>успех</h2>
            <a href="{{route('user.main.index')}}" >
                <button class="btn btn-success mt-2 w-20"> Перейти в кабинет </button>
            </a>
        </div>
    </div>
@endsection
