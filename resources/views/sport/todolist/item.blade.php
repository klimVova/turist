@extends('sport.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление подкатегории// инфраструктура\инвентарь</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="col-6">
                <form action="{{route('sport.todolist.item_store', $sportTodoList->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <input type="text" class="form-control" name="title" placeholder="Название подкатегории// инфраструктура\инвентарь"
                               value="{{old('title')}}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" name="price" placeholder="цена"
                               value="{{old('price')}}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <input type="hidden" name="user_id" value="{{$user}}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
