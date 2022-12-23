@extends('cafe.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Время работы</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{route('cafe.time.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="time_start" placeholder="Начало работы кафе\ресторана"
                                   value="{{old('time_start')}}">
                            @error('time_start')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="time_end" placeholder="Конец работы кафе\ресторана"
                                   value="{{old('time_end')}}">
                            @error('time_end')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="time_date" placeholder="Дни работы кафе\ресторана"
                                   value="{{old('time_date')}}">
                            @error('time_date')
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
