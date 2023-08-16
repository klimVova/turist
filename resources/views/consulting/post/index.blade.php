@extends('consulting.layouts.main')
@include('consulting.includes.title')
@section('content')
        <div class="info">
            <div class="row">
                <div class="col-1 mb-3">
                    <a href="{{route('consulting.post.create', $id)}}" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>
        </div>
        <div class="services">
            услуги
        </div>
    </div>
@endsection
