@extends('layouts.main')

@section('content')

    <main class="blog-post">
        <div class="container">
            <h4>{{$cafeCard->title}}</h4>
            @foreach($times as $time)
                <h5>{{$time->time_date}}</h5>
                <h5>{{$time->time_start}} -- {{$time->time_end}}</h5>
            @endforeach
            @foreach($catalogs as $catalog)
                <h1 style="color:red;">{{$catalog->title}}<br></h1>
                @foreach($categories as $category)
                    @if($category->catalog_id == $catalog->id && $category->deleted_at == NULL)
                        <p style="color:green">{{$category->title}}<br></p>
                        @foreach($posts as $post)
                            @if($post->deleted_at == NULL && $post->cafe_category_id == $category->id &&  $post->cafe_catalog_id == $catalog->id)
                                <div class="d-flex">
                                    <div class="ml-3">
                                        <p style="color:blue;">{{$post->title}}</p>
                                        <p>цена $ {{$post->price}}</p>
                                    </div>
                                </div>
                            @else
                            @endif
                        @endforeach
                    @else
                    @endif
                @endforeach
            @endforeach
        </div>

    </main>
    <div id="map-test" class="map"></div>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU">
    </script>
    <script>
        let center = [{{$cafeCard->coordinate}}];

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
