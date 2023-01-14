@extends('medical.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Услуги</h1>
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
                    <div class="col-9">
                        <form action="{{route('medical.todolist.store')}}" method="POST" class="w-55">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="title" class="form-control"
                                       placeholder="Добавить новую категорию">
                                <input type="hidden" name="user_id" value="{{$user}}">
                                <button type="submit" class="btn btn-dark btn-sm px-4">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </form>
                        @if(count($medicalTodoLists))
                            <ul style="background:antiquewhite;" class="list-group mt-3">
                                @foreach($medicalTodoLists as $medicalTodoList)
                                    <li class="list-group-item justify-content-sm-between d-flex">
                                        <div class="col">
                                            <h6 class="text-indigo font-weight-bold">главная категория</h6>
                                            <div class="d-flex justify-content-xl-between">
                                                <div><h3>{{$medicalTodoList->title}}</h3></div>
                                                <div class="d-flex">
                                                    <a href="{{route('medical.todolist.edit', $medicalTodoList->id)}}"
                                                       class='text-success mr-5'>
                                                        <i class="fas fa-pencil-alt"></i></a></td>
                                                    <form action="{{route('medical.todolist.delete', $medicalTodoList->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-transparent" l>
                                                            <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                                        </button>
                                                    </form>
                                                    <a style="width: 50px;height: 40px;"
                                                       href="{{route('medical.todolist.item', $medicalTodoList->id)}}">
                                                        <button type="submit" class="btn btn-dark btn-sm px-4">
                                                            <i class="fas fa-plus"></i></button>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </li>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Подкатегория/услуга</th>
                                            <th colspan="3" class="text-center">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $item)
                                            @if($medicalTodoList->id == $item->medical_todo_list_id)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            <h3>{{$item->title}}</h3>
                                                            <h3 class="ml-5">{{$item->price}}$</h3>
                                                        </div>


                                                        <p class="list-group list-group-flush mt-3 ml-5">
                                                        @foreach($products as $product)
                                                            @if($item->id == $product->medical_todo_item_id)
                                                                <div class="d-flex align-items-baseline ml-5">
                                                                    <p class="p-3 font-weight-bold">{{$product->title}} </p>
                                                                    <p class="p-3 font-weight-bold">{{$product->price}} $</p>
                                                                    <p class="pl-5 align-items">
                                                                        <a href="{{route('medical.todoproduct.edit', $product->id)}}"
                                                                           class='text-success'>Редактировать</a>
                                                                    </p>
                                                                    <p class='pl-5'>
                                                                    <form action="{{route('medical.todoitem.product_remove', $product->id)}}"
                                                                          method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                                class="border-0 bg-transparent text-danger">
                                                                            Удалить
                                                                        </button>
                                                                    </form>
                                                                    </p>
                                                                </div>
                                                                <hr>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td><a href="{{route('medical.todoitem.edit', $item->id)}}"
                                                           class='text-success'><i class="fas fa-pencil-alt"></i></a>
                                                    </td>
                                                    <td>
                                                        <form action="{{route('medical.todolist.item_remove', $item->id )}}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="border-0 bg-transparent">
                                                                <i class="fas fa-trash text-danger" role="button"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a style="width: 300px;height: 40px;"
                                                           href="{{route('medical.todoitem.product', $item->id)}}">
                                                            <button type="submit" class="btn btn-dark btn-sm px-4">
                                                                <i class="fas fa-plus"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
