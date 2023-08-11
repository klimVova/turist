@extends('consulting.layouts.main')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @foreach($items as $item)
                            @if($id == $item['id'])
                                <h1 class="m-0">Карта категории {{$item['title']}}</h1>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
