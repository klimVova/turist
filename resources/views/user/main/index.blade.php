@extends('user.layouts.main')
@section('content')
    <div class="container-fluid main content">
        <div class="office">
            <div class="section-label">
                <h2>Личный кабинет</h2>
                <hr>
            </div>
            <nav class="office-nav org-type-sort">
                <ul>
                    <li data-f="profile" class=" spisok">Личные данные</li>
                    <li data-f="cart" class="active spisok">Корзина</li>
                    <li data-f="promocodes" class="spisok">Промокоды</li>
                </ul>
            </nav>

            <div class="row profile hide box">
                <form action="{{route('user.main.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="profile-data">
                        <div class="profile-data-item">
                            <label>Фамилия</label>
                            <input class="edit-dis" type="text" name="surname" value="{{$user->surname}}">
                        </div>
                        <div class="profile-data-item">
                            <label>Имя</label>
                            <input class="edit-dis" type="text" name="name" value="{{$user->name}}">
                        </div>
                        <div class="profile-data-item">
                            <label>email</label>
                            <input class="edit-dis" type="text" name="email" value="{{$user->email}}">
                        </div>
                        <div class="profile-data-item">
                            <label>Пол</label>
                            <div class="radio">
                                @if($user->gender == 'men')
                                    <input class="edit-dis" type="radio" name="gender" value="men" checked="">
                                    <p>Мужской</p>
                                    <input class="edit-dis" type="radio" name="gender" value="women">
                                    <p>Женский</p>
                                @else
                                    <input class="edit-dis" type="radio" name="gender" value="men">
                                    <p>Мужской</p>
                                    <input class="edit-dis" type="radio" name="gender" value="women" checked="">
                                    <p>Женский</p>
                                @endif
                            </div>
                        </div>
                        <div class="profile-data-item">
                            <label>Возраст</label>
                            <input class="edit-dis" type="text" name="age" value="{{$user->age}}">
                        </div>
                        <div class="profile-data-item">
                            <label>Телефон</label>
                            @if($user->phone == '')
                                <input class="edit-dis" type="text" name="phone" placeholder="Номер телефона" value="">
                            @else
                                <input class="edit-dis" type="text" name="phone" value="{{$user->phone}}">
                            @endif
                        </div>
                        <div class="profile-data-item">
                            <label>Страна</label>
                            @if($user->user_district == null)
                                <input class="edit-dis" type="text" name="user_district" placeholder="Введите страну"
                                       value="">
                            @else
                                <input class="edit-dis" type="text" name="user_district"
                                       value="{{$user->user_district}}">
                            @endif
                        </div>
                        <div class="profile-data-item">
                            <label>Город</label>
                            @if($user->user_city == null)
                                <input class="edit-dis" type="text" name="user_city" placeholder="Введите город"
                                       value="">
                            @else
                                <input class="edit-dis" type="text" name="user_city" value="{{$user->user_city}}">
                            @endif
                        </div>
                    </div>
                    <div class="form-group w-50">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                    </div>
                    <div class="button">
                        <input
                            type="submit"
                            value="Сохранить изменения"
                        />
                    </div>
                </form>
            </div>

            <div class="cart row box ">
                <div class="col-9 box_mob">
                    <div class="cart-section">
                        @foreach($preOrders as $preOrder)
                            @if($preOrder->role == 'Мед.центр')
                                <div class="product">
                                    <div class="product_item">
                                        <div class="product_item_header">
                                            <p class="product_item_header_name">
                                                Медицинский центр
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="product_item_option">
                                            <img class="product_image" src=" {{$preOrder->image_product}}">
                                            <label class="name"> {{$preOrder->role}}<br>" {{$preOrder->name_product}}
                                                "</label>
                                            <ol class="product_option_list">
                                                @if((json_decode($preOrder->products, true)['productList']) !== null)
                                                    @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                        <li class="product_option_list_item row">
                                                            <div class="product_list_item_header col-9">
                                                                <div>{{$list['product']}}</div>
                                                                <div class="product_option_list_item_qty">
                                                                    <span>{{$list['qty']}} </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 product_option_list_item_cost">
                                                                <p>{{$list['price']}} &nbsp</p>
                                                                <p> p</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                @endif
                                            </ol>
                                            <label
                                                class="date">  {{json_decode($preOrder->products, true)['date']}}</label>
                                            <form class="product_form" action="{{route('user.maim.delete', $preOrder->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent" l>
                                                    <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            @elseif($preOrder->role == 'spa')
                                <div class="product">
                                    <div class="product_item">
                                        <div class="product_item_header">
                                            <p class="product_item_header_name">
                                                СПА/Бьюти
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="product_item_option">
                                            <img class="product_image" src=" {{$preOrder->image_product}}">
                                            <label class="name"> {{$preOrder->role}}
                                                <br>" {{$preOrder->name_product}}
                                                "</label>
                                            <ol class="product_option_list">
                                                @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                    <li class="product_option_list_item row">
                                                        <div class="product_list_item_header col-9">
                                                            <div>{{$list['product']}}</div>
                                                            <div class="product_option_list_item_qty">
                                                                <span>{{$list['qty']}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 product_option_list_item_cost">
                                                            <p>{{$list['price']}} &nbsp</p>
                                                            <p> p</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                            <label
                                                class="date">  {{json_decode($preOrder->products, true)['date']}}</label>
                                            <form class="product_form" action="{{route('user.maim.delete', $preOrder->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent" l>
                                                    <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @elseif($preOrder->role == 'cafe')
                                        <div class="product">
                                            <div class="product_item">
                                                <div class="product_item_header">
                                                    <p class="product_item_header_name">
                                                        Кафе\Ресторан
                                                    </p>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="product_item_option">
                                                <img class="product_image" src=" {{$preOrder->image_product}}">
                                                <label class="name"> {{$preOrder->role}}
                                                    <br>" {{$preOrder->name_product}}
                                                    "</label>
                                                <ol class="product_option_list">
                                                    @if((json_decode($preOrder->products, true)['productList']) !== null)
                                                        @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                            <li class="product_option_list_item row">
                                                                <div class="product_list_item_header col-9 ">
                                                                    <div>{{$list['product']}}</div>
                                                                    <div class="product_option_list_item_qty">
                                                                        <span>{{$list['qty']}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3 product_option_list_item_cost">
                                                                    <p>{{$list['price']}} &nbsp</p>
                                                                    <p> p</p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                    @endif
                                                </ol>
                                                {{--                                                    <ul class="service">--}}
                                                {{--                                                        @if((json_decode($preOrder->products, true)['product']) !== null)--}}
                                                {{--                                                            @foreach((json_decode($preOrder->products, true)['product']) as $item)--}}
                                                {{--                                                                <li class="product_list">--}}
                                                {{--                                                                    <div class="product_item_header">--}}
                                                {{--                                                                        <h5 class="text-bold">{{$item['cat']}}</h5>--}}
                                                {{--                                                                        <p>{{$item['product']}}</p>--}}
                                                {{--                                                                    </div>--}}
                                                {{--                                                                    <span>{{$item['qty']}}</span>--}}
                                                {{--                                                                    <label class="cost">  {{$item['price']}}р</label>--}}
                                                {{--                                                                </li>--}}
                                                {{--                                                            @endforeach--}}
                                                {{--                                                        @else--}}
                                                {{--                                                        @endif--}}
                                                {{--                                                    </ul>--}}
                                                <label
                                                    class="date">  {{json_decode($preOrder->products, true)['date']}}</label>
                                                <form class="product_form" action="{{route('user.maim.delete', $preOrder->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent" l>
                                                        <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            @elseif($preOrder->role == 'hostel')
                                <div class="product">
                                    <div class="product_item">
                                        <div class="product_item_header">
                                            <p class="product_item_header_name">
                                                Отель
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="product_item_option">
                                        <img class="product_image" src=" {{$preOrder->image_product}}">
                                        <label class="name col"> {{$preOrder->role}}
                                            <br>" {{$preOrder->name_product}}
                                            "</label>
                                        <ol class="product_option_list col-5">
                                            <li class="product_option_list_item product_option_list_item_m row">
                                                <div class="product_list_item_header_hostel ">
                                                    <div> <span>{{json_decode($preOrder->products, true)['category'] }}</span></div>
                                                    <div> <span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span></div>
                                                </div>
                                                <div class="product_list_item_header ">
                                                    <span>{{json_decode($preOrder->products, true)['title'] }}</span>
                                                </div>
                                                <div class="product_option_list_item_cost">
                                                    <p>{{$list['price']}} &nbsp</p>
                                                    <p> p</p>
                                                </div>
                                            </li>
                                        </ol>
                                        <div class="col product_option_list_item_date" >
                                            @foreach(json_decode($preOrder->products, true)['date'] as $list)
                                                <label class="date">{{$list}}</label>
                                            @endforeach
                                        </div>
                                        <form  class="product_form" action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            @elseif($preOrder->role == 'sanatorium')
                                <div class="product">
                                    <div class="product_item">
                                        <div class="product_item_header">
                                            <p class="product_item_header_name">
                                                Cанаторий
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="product_item_option">
                                        <img class="product_image" src=" {{$preOrder->image_product}}">
                                        {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                        <label class="name col"> {{$preOrder->role}}
                                            <br>" {{$preOrder->name_product}}
                                            "</label>
                                        <div class="product_list_item_header_hostel ">
                                            <div class="product_list_item_header_hostel_m"> <span>{{json_decode($preOrder->products, true)['category'] }}</span></div>
                                            <div class="product_list_item_header_hostel_m"> <span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span></div>
                                            <div class="col product_option_list_item_date_san" >
                                                @foreach(json_decode($preOrder->products, true)['date'] as $list)
                                                    <label class="date">{{$list}}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <ol class="product_option_list_san col-5">
                                            @if((json_decode($preOrder->products, true)['productList']) !== null)
                                                @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                    <li class="product_option_list_item row">
                                                        <div class="product_list_item_header col-9">
                                                            <div>{{$list['product']}}</div>
                                                            <div class="product_option_list_item_qty">
                                                                <span>{{$list['qty']}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="product_option_list_item_cost col-3">
                                                            <p>{{$list['price']}} &nbsp</p>
                                                            <p> p</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                            @endif
                                        </ol>
                                        {{--                                        <ul class="service">--}}
                                        {{--                                            @if((json_decode($preOrder->products, true)['product']) !== null)--}}
                                        {{--                                                @foreach((json_decode($preOrder->products, true)['product']) as $item)--}}
                                        {{--                                                    <li class="product_list">--}}
                                        {{--                                                        <div class="product_item_header">--}}
                                        {{--                                                            <h5 class="text-bold">{{$item['cat']}}</h5>--}}
                                        {{--                                                            <p>{{$item['product']}}</p>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <span>{{$item['qty']}}</span>--}}
                                        {{--                                                        <label class="cost">  {{$item['price']}}р</label>--}}
                                        {{--                                                    </li>--}}
                                        {{--                                                @endforeach--}}
                                        {{--                                            @else--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </ul>--}}
                                        <form class="product_form" action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            @elseif($preOrder->role == 'tur')
                                <div class="product">
                                    <div class="product_item">
                                        <div class="product_item_header">
                                            <p class="product_item_header_name">
                                                Туроператор
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_item_option">
                                    <img class="product_image" src=" {{$preOrder->image_product}}">
                                    {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                    <label class="name col">"{{$preOrder->name_product}}"</label>
                                    <div class="product_list_item_header_hostel col">
                                        <div class="product_list_item_header_hostel_m"> <span>{{json_decode($preOrder->products, true)['title'] }}</span></div>
                                        <div class="product_list_item_header_hostel_m"> <span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span></div>
                                    </div>
                                    <ol class="product_option_list_tur col">
                                        <li class="product_option_list_item row">
                                            <div class="col-9">
                                                <label class="date">{{json_decode($preOrder->products, true)['date'] }}</label>
                                            </div>
                                            <div class="col-3 product_option_list_item_cost">
                                                <p>{{json_decode($preOrder->products, true)['price']}}&nbsp</p>
                                                <p> p</p>
                                            </div>
                                        </li>
                                    </ol>
                                    {{--                                        <label class="date">  {{json_decode($preOrder->products, true)['date']}}</label>--}}
                                    <form class="product_form" action="{{route('user.maim.delete', $preOrder->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent" l>
                                            <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-3  all-cost-mob">
                    <div class="all-cost">
                        <div class="cost-item">
                            <div class="cost-item-block">
                                <p>Общая сумма заказа:</p>
                                <label>6800р</label>
                            </div>
                            <span>(оплата на месте)</span>
                        </div>
                        <div class="cost-item">
                            <div class="cost-item-block">
                                <p>К оплате платформе (10%):</p>
                                <label>680р</label>
                            </div>
                            <span>(оплата сейчас)</span>
                        </div>

                        <input type="submit" value="Оплатить 10%">
                    </div>
                </div>
            </div>
            <div class="promocodes box hide">
                <div class="cart-section">
                    <div class="section-label">
                        <h2>Отели</h2>
                        <hr>
                    </div>
                    <div class="rooms">
                        <div class="item">
                            <label class="name">Отель "Comfortee"<br>Стандарт (1 человек)</label>
                            <label class="promocode">500-20-303</label>
                            <label class="date">24.03.2023</label>
                        </div>
                        <div class="item promocode-used">
                            <label class="name">Отель "Звезда"<br>Люкс (1 человек)</label>
                            <label class="promocode">500-29-999</label>
                            <label class="date">14.01.2022</label>
                        </div>
                    </div>
                </div>
                <div class="cart-section">
                    <div class="section-label">
                        <h2>Медицинские центры</h2>
                        <hr>
                    </div>
                    <div class="rooms">
                        <div class="item">
                            <label class="name">Мед. центр "FamilyMed"<br>Консультация хирурга</label>
                            <label class="promocode">540-27-657</label>
                            <label class="date">04.03.2023</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
