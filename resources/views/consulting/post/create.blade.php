@extends('consulting.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('consulting.post.store' , $id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название центра"
                                       value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger text-bold ">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <label> Email (для получения уведомлений:промокод,заказ) </label>
                                <input type="text" class="form-control" name="user_email" placeholder="Email"
                                       value="{{old('user_email')}}">
                                @error('user_email')
                                <div class="text-danger text-bold ">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="address" placeholder="Укажите город"
                                       value="{{old('address')}}">
                                @error('address')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger text-bold">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{$user}}">
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="cat_id" value="{{$id}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
