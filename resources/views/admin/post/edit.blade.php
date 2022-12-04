@extends('admin.layouts.main')
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
                        <form action="{{route('admin.post.update', $post->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                       value="{{$post->title}}">
                                @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{$post->content}}</textarea>

                                @error('content')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="mb-3 d-flex">
                                    <img class="img-thumbnail" style="height: 30vh;"
                                         src="{{ url('storage/' . $post->preview_image)}}" alt="preview_image">
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
                                <label>Выберите категорию</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                {{$category->id == $post->category_id ? ' selected' : '' }}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Тэги</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple"
                                        data-placeholder="Выберите тэги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                                {{is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                                                value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                            <div class="form-group w-25">
                                <a style="width: 300px;height: 40px;"
                                   href="{{route('admin.post.image', $post->id)}}"
                                   class="btn btn-block btn-primary"> Обновить фото</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
