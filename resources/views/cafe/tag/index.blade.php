@extends('cafe.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Тэги</h1>
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
                        <a href="{{route('cafe.tag.create')}}" class="btn btn-block btn-primary">Добавить</a>
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
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cafeTags as $cafeTag)
                                        <tr>
                                            <td>{{$cafeTag->id}}</td>
                                            <td>{{$cafeTag->title}}</td>
                                            <td><a href="{{route('cafe.tag.show', $cafeTag->id)}}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('cafe.tag.edit', $cafeTag->id)}}"
                                                   class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('cafe.tag.delete', $cafeTag->id)}}" method="post">
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
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
