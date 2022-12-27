@extends('spa.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2"> {{$spaTime->title}}</h1>
                        <a href="{{route('spa.time.edit', $spaTime->id)}}" class='text-success'><i class="fas fa-pencil-alt"></i></a>
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
                                        <td>ID</td>
                                        <td>{{$spaTime->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Начало</td>
                                        <td>{{$spaTime->time_start}}</td>
                                    </tr>
                                    <tr>
                                        <td>Конец</td>
                                        <td>{{$spaTime->time_end}}</td>
                                    </tr>
                                    <tr>
                                        <td>Дни работы</td>
                                        <td>{{$spaTime->time_date}}</td>
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
