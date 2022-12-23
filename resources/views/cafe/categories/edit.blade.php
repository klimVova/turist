@extends('cafe.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование категории</h1>
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
                    <form action="{{route('cafe.category.update', $cafeCategory->id)}}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Название категории"
                            value="{{$cafeCategory->title}}"
                            >
                            @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите каталог</label>
                            <select name="catalog_id" class="form-control">
                                @foreach($cafeCatalogs as $cafeCatalog)
                                    <option value="{{$cafeCatalog->id}}"
                                            {{$cafeCatalog->id == $cafeCategory->catalog_id ? ' selected' : '' }}>{{$cafeCatalog->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
@endsection
