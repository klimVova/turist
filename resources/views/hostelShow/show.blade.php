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
    <div id="map-test" class="map"></div>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU">
    </script>
    <script>
        let center = [{{$hostelCard->coordinate}}];

        function init() {
            let map = new ymaps.Map('map-test', {
                center: center,
                zoom: 17
            });
            let placemark = new ymaps.Placemark(center, {}, {
                iconLayout: 'default#image',
                iconImageSize: [30, 30],
                iconImageOffset: [-19, -44]
            });
            map.controls.remove('geolocationControl'); // удаляем геолокацию
            map.controls.remove('searchControl'); // удаляем поиск
            map.controls.remove('trafficControl'); // удаляем контроль трафика
            map.controls.remove('typeSelector'); // удаляем тип
            map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
            map.controls.remove('zoomControl'); // удаляем контрол зуммирования
            map.controls.remove('rulerControl'); // удаляем контрол правил
            // map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
            map.geoObjects.add(placemark);
        }
        ymaps.ready(init);
    </script>
    <style>
        .map {
            width: 500px;
            height: 500px;
            background-color: #333;
        }

        [class*="copyrights-pane"] {
            display: none !important;
        }

        [class*="ground-pane"] {
            filter: grayscale(1);
        }
    </style>
@endsection
