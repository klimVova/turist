@extends('turoperator.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактировани поста </h1>
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
                        <form action="{{route('turoperator.post.update', $turoperatorPost->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                       value="{{$turoperatorPost->title}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{$turoperatorPost->content}}</textarea>

                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="price" placeholder="Укажите цену"
                                       value="{{$turoperatorPost->price}}">
                                @error('price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="date" placeholder="Укажите время действия путевки"
                                       value="{{$turoperatorPost->date}}">
                                @error('price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="berth" placeholder="Укажите количество человек"
                                       value="{{$turoperatorPost->berth}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile"> Обновить превью</label>
                                <div class="mb-3 d-flex">
                                    <img class="img-thumbnail" style="height: 30vh;"
                                         src="{{ url('storage/' . $turoperatorPost->turoperator_preview_image)}}" alt="preview_image">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="turoperator_preview_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите категорию</label>
                                <select name="turoperator_category_id" class="form-control">
                                    @foreach($turoperatorCategories as $turoperatorCategory)
                                        <option value="{{$turoperatorCategory->id}}"
                                                {{$turoperatorCategory->id == $turoperatorPost->turoperator_category_id ? ' selected' : '' }}>{{$turoperatorCategory->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Тэги</label>
                                <select class="select2" name="turoperator_tag_ids[]" multiple="multiple"
                                        data-placeholder="Выберите услугу" style="width: 100%;">
                                    @foreach($turoperatorTags as $turoperatorTag)
                                        <option
                                                {{is_array( $turoperatorPost->tags->pluck('id')->toArray()) && in_array($turoperatorTag->id, $turoperatorPost->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                                                value="{{$turoperatorTag->id}}">{{$turoperatorTag->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                            <div class="form-group w-25">
                                <a style="width: 300px;height: 40px;"
                                   href="{{route('turoperator.post.image', $turoperatorPost->id)}}"
                                   class="btn btn-block btn-primary"> Обновить фото</a>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
