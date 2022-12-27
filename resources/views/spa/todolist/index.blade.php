@extends('spa.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Список услуг</h1>
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
                    <div class="col-6">
                        <form action="{{route('spa.todolist.store')}}" method="POST" class="w-55">
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
                        @if(count($spaTodoLists))
                            <ul class="list-group list-group-flush mt-3">
                                @foreach($spaTodoLists as $spaTodoList)
                                    <li class="list-group-item justify-content-sm-between d-flex">
                                        {{$spaTodoList->title}}
                                        <a href="{{route('spa.todolist.edit', $spaTodoList->id)}}"
                                           class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                        <form action="{{route('spa.todolist.delete', $spaTodoList->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                        <a style="width: 300px;height: 40px;"
                                           href="{{route('spa.todolist.item', $spaTodoList->id)}}">
                                            <button type="submit" class="btn btn-dark btn-sm px-4">
                                                <i class="fas fa-plus"></i></button>
                                        </a>
                                    </li>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Название</th>
                                            <th colspan="3" class="text-center">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $item)
                                            @if($spaTodoList->id == $item->spa_todo_list_id)
                                        <tr>
                                            <td><h3>{{$item->title}}</h3>
                                                <p class="list-group list-group-flush mt-3">
                                                    @foreach($products as $product)
                                                        @if($item->id == $product->spa_todo_item_id)
                                                            <div class="d-flex align-items-baseline">
                                                                <p class="p-3">{{$product->title}} </p> <hr>
                                                                <p class="pl-5 align-items">
                                                                    <a href="{{route('spa.todoproduct.edit', $product->id)}}"
                                                                       class='text-success'>Редактировать</a>
                                                                </p>
                                                                <p class='pl-5'>
                                                                <form action="{{route('spa.todoitem.product_remove', $product->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="border-0 bg-transparent text-danger" >
                                                                        Удалить
                                                                    </button>
                                                                </form>
                                                                </p>
                                                            </div>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                </>
                                            </td>
                                            <td><a href="{{route('spa.todoitem.edit', $item->id)}}"
                                                   class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('spa.todolist.item_remove', $item->id )}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent" >
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a style="width: 300px;height: 40px;"
                                                   href="{{route('spa.todoitem.product', $item->id)}}">
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
