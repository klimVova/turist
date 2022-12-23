@extends('cafe.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактировани блюда </h1>
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
                        <form action="{{route('cafe.post.update', $cafePost->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название блюда"
                                       value="{{$cafePost->title}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{old('content')}}</textarea>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="price" placeholder="Укажите цену"
                                       value="{{$cafePost->price}}">
                                @error('price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите каталог</label>
                                <select name="cafe_catalog_id" class="form-control">
                                    @foreach($cafeCatalogs as $cafeCatalog)
                                        <option value="{{$cafeCatalog->id}}"
                                                {{$cafeCatalog->id == $cafePost->cafe_catalog_id ? ' selected' : '' }}>{{$cafeCatalog->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите категорию</label>
                                <select name="cafe_category_id" class="form-control">
                                    @foreach($cafeCategories as $cafeCategory)
                                        <option value="{{$cafeCategory->id}}"
                                                {{$cafeCategory->id == $cafePost->cafe_category_id ? ' selected' : '' }}>{{$cafeCategory->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
