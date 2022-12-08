@extends('layouts.main')

@section('content')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->preview_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="row" style="margin:0;">
                    @foreach($images as $image)
                        <div class="col-12 col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img class="img-thumbnail" style="height: 30vh;" src="{{ url('storage/post_images/' . $image->images )}}" alt="main_image">
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        @foreach($posts as $post)
            @if($post->deleted_at == NULL)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
            </tr>
            </tbody>
            @else
           @endif
        @endforeach
    </main>

@endsection
