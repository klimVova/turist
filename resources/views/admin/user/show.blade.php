@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2"> {{$user->name}}</h1>
                        <a href="{{route('admin.user.edit', $user->id)}}" class='text-success'><i
                                    class="fas fa-pencil-alt"></i></a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td class="text-bold">ID</td>
                                        <td>{{$user->id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Название</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Почта</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Вид организации</td>
                                        <td>@if($user->type == null){{'-'}}@else{{$user->type->title}}@endif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Город</td>
                                        <td>@if($user->city == null){{'-'}}@else{{$user->city->title}}@endif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Область/республика</td>
                                        <td>@if($user->republic == null){{'-'}}@else{{$user->republic->title}}@endif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Федеральный округ</td>
                                        <td>@if($user->district == null){{'-'}}@else{{$user->district->title}}@endif</td>
                                    </tr>
                                    </tbody>

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
