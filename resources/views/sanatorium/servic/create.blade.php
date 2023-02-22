@extends('sanatorium.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление услуг и удобства</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('sanatorium.servic.store')}}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Название услуг и удобства">
                            @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <input type="hidden" name="user_id" value="{{$user}}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
