@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Организации</h1>
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
                    <div class="col-1 mb-3">
                        <a href="{{route('admin.user.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Почта</th>
                                        <th>Вид организации</th>
                                        <th>Город</th>
                                        <th>Регион (область)</th>
                                        <th>Страна</th>
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>@if($user->type == null){{'-'}}@else{{$user->type->title}}@endif</td>
                                            <td>@if($user->city == null){{'-'}}@else{{$user->city->title}}@endif</td>
                                            <td>@if($user->republic == null){{'-'}}@else{{$user->republic->title}}@endif</td>
                                            <td>@if($user->district == null){{'-'}}@else{{$user->district->title}}@endif</td>
                                            <td><a href="{{route('admin.user.show', $user->id)}}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('admin.user.edit', $user->id)}}"
                                                   class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('admin.user.delete', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
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
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
