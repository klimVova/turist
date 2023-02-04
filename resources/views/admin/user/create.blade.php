@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить новую организацию</h1>
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
                    <form action="{{route('admin.user.store')}}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Название организации">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password" placeholder="Пароль">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-100">
                            <label>Выберите страну</label>
                            <select name="district_id" class="form-control">
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}"
                                            {{$district->id == old('$district_id') ? ' selected' : '' }}>{{$district->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-100">
                            <label>Выберите Регион (область)у</label>
                            <select name="republic_id" class="form-control">
                                @foreach($republics as $republic)
                                    <option value="{{$republic->id}}"
                                            {{$republic->id == old('$republic_id') ? ' selected' : '' }}>{{$republic->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-100">
                            <label>Выберите город</label>
                            <select name="city_id" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}"
                                            {{$city->id == old('city_id') ? ' selected' : '' }}>{{$city->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-100">
                            <label>Выберите вид организации</label>
                            <select name="type_id" class="form-control">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}"
                                            {{$type->id == old('type_id') ? ' selected' : '' }}>{{$type->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-100">
                            <label>Выберите роль организации</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{$id}}"
                                            {{$id == old('role_id') ? ' selected' : '' }}>{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </form>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
@endsection
