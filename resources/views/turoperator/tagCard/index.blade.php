@extends('turoperator.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Услуги для главной карточки отеля</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1 mb-3">
                        @if(count($turoperatorCardTags ) < 5)
                        <a href="{{route('turoperator.tagCard.create')}}" class="btn btn-block btn-primary">Добавить</a>
                        @else
                            <a href="{{route('turoperator.tagCard.create')}}" class="btn btn-block btn-primary disabled">Добавить</a>
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
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($turoperatorCardTags as $turoperatorCardTag)
                                        <tr>
                                            <td>{{$turoperatorCardTag->id}}</td>
                                            <td>{{$turoperatorCardTag->title}}</td>
                                            <td><a href="{{route('turoperator.tagCard.show', $turoperatorCardTag->id)}}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('turoperator.tagCard.edit', $turoperatorCardTag->id)}}"
                                                   class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('turoperator.tagCard.delete', $turoperatorCardTag->id)}}" method="post">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
