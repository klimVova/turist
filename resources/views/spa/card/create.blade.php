@extends('spa.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создать карточку центра</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{route('spa.card.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="title" placeholder="Название центра"
                                   value="{{old('title')}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <label>краткое описание</label>
                        <div class="form-group">
                            <textarea class="textarea" rows='5' cols='70' name="desc">{{old('desc')}}</textarea>
                            <div class="counter">
                                <span class="current">0</span>&nbsp;/
                                <span class="total">225</span>
                            </div>
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="textarea1" rows="10" cols="70" name="content">{{old('content')}}</textarea>
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
                                   value="{{old('address')}}">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
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
                            <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Добавить логотип организации</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo">
                                    <label class="custom-file-label">Выберите логоти</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('logo')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="tel" class="form-control" name="phone" placeholder="Введите номер телефона"
                                   value="{{old('phone')}}">
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="name_link" placeholder="Введите название ccылки на сайт вашей организации"
                                   value="{{old('name_link')}}">
                            @error('link')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="link" placeholder="Введите ccылку на сайт вашей организации"
                                   value="{{old('link')}}">
                            @error('link')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="coordinate_l" placeholder="Введите координаты расположения, до запятой"
                                   value="{{old('coordinate_l')}}">
                            @error('coordinate')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="coordinate_r" placeholder="Введите координаты расположения, после запятой"
                                   value="{{old('coordinate_r')}}">
                            @error('coordinate')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите тип организации</label>
                            <select name="type_id" class="form-control">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}"
                                            {{$type->id == old('type_id') ? ' selected' : '' }}>{{$type->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите страну</label>
                            <select name="district_id" class="form-control">
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}"
                                            {{$district->id == old('district_id') ? ' selected' : '' }}>{{$district->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите регион(область)</label>
                            <select name="republic_id" class="form-control">
                                @foreach($republics as $republic)
                                    <option value="{{$republic->id}}"
                                            {{$republic->id == old('republic_id') ? ' selected' : '' }}>{{$republic->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите город</label>
                            <select name="city_id" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}"
                                            {{$city->id == old('city_id') ? ' selected' : '' }}>{{$city->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Тэги</label>
                            <select class="select2" name="spa_tag_ids[]" multiple="multiple"
                                    data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach($spaTags as $spaTag)
                                    <option
                                            {{is_array(old('$spaTag_ids')) && in_array($spaTag->id, old('spaTag_ids')) ? ' selected' : ''}}
                                            value="{{$spaTag->id}}">{{$spaTag->title}}</option>
                                @endforeach
                            </select>
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
