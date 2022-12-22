@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($hostelCards as $hostelCard)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{'storage/'. $hostelCard->preview_image}}" alt="blog post">
                            </div>
                            <a href="{{route('hostelShow.show' , $hostelCard->id)}}"  class="blog-post-permalink">
                                <h4>{{$hostelCard->title}}</h4></a>
                            <p>{!! $hostelCard->content !!}</p>
                            <p>{{$hostelCard->location}}</p>
                            <p>@if($hostelCard->phone != Null)
                                +{{$hostelCard->phone}}
                                @else
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
