@extends('consulting.layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('consulting.includes.title')
        <div class="info ml-3">
            <div class="row">
                <div class="col-1 mb-3">
                    @if(count($consultingPosts) > 0)
                        <a href="{{route('consulting.post.create', $id)}}" class="btn btn-block btn-primary disabled">Добавить</a>
                    @else
                        <a href="{{route('consulting.post.create', $id)}}"
                           class="btn btn-block btn-primary">Добавить</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Город</th>
                                    <th>Почта</th>
                                    <th>Фото(превью)</th>
                                    <th colspan="2" class="text-center">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($consultingPosts as $consultingPost)
                                    <tr>
                                        <td>{{$consultingPost->id}}</td>
                                        <td>{{$consultingPost->title}}</td>
                                        <td>{{$consultingPost->address}}</td>
                                        <td>{{$consultingPost->user_email}}</td>
                                        <td><img class="img-thumbnail" style="height: 10vh;"
                                                 src="{{ url('storage/' . $consultingPost->preview_image)}}"
                                                 alt="preview_image"></td>
                                        <td><a href="{{route('consulting.post.edit', $consultingPost->id)}}"
                                               class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                        <td>
                                            <form action="{{route('consulting.post.delete', $consultingPost->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent" l>
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <div class="services">
                <h1>Описание категории</h1>
                <div class="w-50">
                    <form action="{{route('consulting.action.store'), $id}}" method="POST" class="w-55">
                        @csrf
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" name="title" class="form-control"
                                       placeholder="Добавить новое описание">
                                @error('title')
                                <div class="text-danger text-bold ">{{$message}}</div>
                                @enderror
                                <input type="hidden" name="user_id" value="{{$user}}">
                                <input type="hidden" name="cat_id" value="{{$id}}">
                                @if(count($actions) >= 5)
                                    <button type="submit" class="btn btn-dark btn-sm px-4 disabled">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-dark btn-sm px-4">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                        <table class="table">
                            <thead class="thead">
                            <tr>
                                <th scope="col">Название</th>
                                <th colspan="2" class="text-center">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($actions as $action)
                                <tr>
                                    <td> {{$action->title}}</td>
                                    <td class="d-flex justify-content-sm-center"><a
                                            href="{{route('consulting.action.edit', $action->id)}}"
                                            class='text-success mr-3'><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{route('consulting.action.delete', $action->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="services">
                <h1>Услуги</h1>
                <div class="w-50">
                    <form action="{{route('consulting.todolist.store'), $id}}" method="POST" class="w-55">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="title" class="form-control"
                                   placeholder="Добавить новое описание">
                            @error('title')
                            <div class="text-danger text-bold ">{{$message}}</div>
                            @enderror
                            <input type="text" name="price" class="form-control"
                                   placeholder="Добавить новое описание">
                            @error('price')
                            <div class="text-danger text-bold ">{{$message}}</div>
                            @enderror
                            <input type="hidden" name="user_id" value="{{$user}}">
                            <input type="hidden" name="cat_id" value="{{$id}}">
                            <button type="submit" class="btn btn-dark btn-sm px-4">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </form>
                    <div class="mt-3">
                        <table class="table">
                            <thead class="thead">
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Цена</th>
                                <th colspan="2" class="text-center">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consulting_todo_lists as $consulting_todo_list)
                                <tr>
                                    <td> {{$consulting_todo_list->title}}</td>
                                    <td> {{$consulting_todo_list->price}}</td>
                                    <td class="d-flex justify-content-sm-center"><a
                                            href="{{route('consulting.todolist.edit', $consulting_todo_list->id)}}"
                                            class='text-success mr-3'><i class="fas fa-pencil-alt"></i></a>
                                        <form
                                            action="{{route('consulting.todolist.delete', $consulting_todo_list->id)}}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
