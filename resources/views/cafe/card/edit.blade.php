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
                        <label> Email (для получения уведомлений:промокод,заказ) </label>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="user_email" placeholder="Email"
                                   value="{{$cafeCard->user_email}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <label> Краткое описание </label>
                        <div class="form-group">
                            <textarea class="textarea"  rows='5' cols='70' name="desc">{{$cafeCard->desc}}</textarea>
                            <div class="counter">
                                <span class="current">0</span>&nbsp;/
                                <span class="total">225</span>
                            </div>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="textarea1"   rows='10' cols='70' name="content">{{$cafeCard->content}}</textarea>
                            <div class="counter1">
                                <span class="current1">0</span>&nbsp;/
                                <span class="total">225</span>
                            </div>
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
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Обновить логотип</label>
                            <div class="mb-3 d-flex">
                                <img class="img-thumbnail" style="height: 30vh;"
                                     src="{{ url('storage/' . $cafeCard->logo)}}" alt="logo">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                            </div>
                            @error('logo')
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
                            <input type="text" class="form-control" name="name_link" placeholder="Обновить название ссылки на Вашу организацию"
                                   value="{{$cafeCard->name_link}}">
                            @error('message')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="link" placeholder="Обновить ссылку на Вашу организацию"
                                   value="{{$cafeCard->link}}">
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="coordinate_l" placeholder="Введите координаты до запятой"
                                   value="{{$cafeCard->coordinate_l}}">
                            @error('coordinate')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="coordinate_r" placeholder="Введите координаты после запятой"
                                   value="{{$cafeCard->coordinate_r}}">
                            @error('coordinate')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Тэги</label>
                            <select class="select2" name="cafe_tag_ids[]" multiple="multiple"
                                    data-placeholder="Выберите услугу" style="width: 100%;">
                                @foreach($cafeTags as $cafeTag)
                                    <option
                                            {{is_array( $cafeCard->cafeTags->pluck('id')->toArray()) && in_array($cafeTag->id, $cafeCard->cafeTags->pluck('id')->toArray()) ? ' selected' : ''}}
                                            value="{{$cafeTag->id}}">{{$cafeTag->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
                        <div class="form-group w-25">
                            <a style="width: 300px;height: 40px;"
                               href="{{route('cafe.card.image', $cafeCard->id)}}"
                               class="btn btn-block btn-primary"> Обновить фото</a>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>

@endsection
