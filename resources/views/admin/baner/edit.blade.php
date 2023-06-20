@extends('baner.layouts.main')
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
                        <form action="{{route('admin.baner.update', $baner->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <a style="width: 300px;height: 40px;"
                                   href="{{route('admin.baner.image', $baner->id)}}"
                                   class="btn btn-block btn-primary"> Обновить фото</a>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
