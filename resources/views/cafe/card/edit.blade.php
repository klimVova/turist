@extends('cafe.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование карточки cafe</h1>
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
                    <form action="{{route('cafe.card.update', $cafeCard->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="title" placeholder="Название кофе"
                                   value="{{$cafeCard->title}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content">{{$cafeCard->content}}</textarea>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="address" placeholder="Укажите локацию"
                                   value="{{$cafeCard->address}}">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Обновить превью</label>
                            <div class="mb-3 d-flex">
                                <img class="img-thumbnail" style="height: 30vh;"
                                     src="{{ url('storage/' . $cafeCard->preview_image)}}" alt="preview_image">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="tel" class="form-control" name="phone" placeholder="Введите номер телефона"
                                   value="{{$cafeCard->phone}}">
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="coordinate" placeholder="Введите координаты расположение"
                                   value="{{$cafeCard->coordinate}}">
                            @error('coordinate')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
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
