@extends('layouts.main')

@section('content')

    <main class="blog-post">
        <div class="container">
            <h4>{{$hostelCard->title}}</h4>
            @foreach($posts as $post)
                @if($post->deleted_at == NULL)
                    <div class="d-flex">
                        <div>
                            <img class="img-thumbnail" style="height: 30vh;"
                                 src="{{ url('storage/'.$post->hostel_preview_image )}}" alt="main_image">
                        </div>
                        <div class="ml-3">
                            <h2>{{$post->title}}</h2>
                            <h6>цена $ {{$post->price}}</h6>
                            <p>{!! $post->content !!}</p><br>
                            @foreach($categories as $category)
                                @if($post->hostel_category_id == $category->id)
                                    <h1>{{$category->title}}<br></h1>
                                @else
                                @endif
                            @endforeach
                            <a href="{{route('hostelShow.images' , $post->id)}}" class="btn btn-primary">
                                Подробнее
                            </a>
                        </div>
                    </div>
                    </tbody>
                @else
                @endif
            @endforeach
        </div>

    </main>
@endsection
