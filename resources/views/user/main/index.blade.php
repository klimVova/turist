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
                                                                <div
                                                                    class="product_list_item_header_head">{{$list['product']}}</div>
                                                                <div class="product_option_list_item_qty">
                                                                    <span>({{$list['qty']}}шт) </span>
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
                                            <form class="product_form"
                                                  action="{{route('user.maim.delete', $preOrder->id)}}"
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
                                                @if(isset(json_decode($preOrder->products, true)['productList']))
                                                    @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                        <li class="product_option_list_item row">
                                                            <div class="product_list_item_header col-9">
                                                                <div
                                                                    class="product_list_item_header_head">{{$list['product']}}</div>
                                                                <div class="product_option_list_item_qty">
                                                                    <span>({{$list['qty']}}шт)</span>
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
                                            <form class="product_form"
                                                  action="{{route('user.maim.delete', $preOrder->id)}}"
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
                                                            <div
                                                                class="product_list_item_header_head">{{$list['product']}}</div>
                                                            <div class="product_option_list_item_qty">
                                                                <span>({{$list['qty']}}шт)</span>
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
                                        <form class="product_form"
                                              action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>
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
                                                    <div><span
                                                            class="product_list_item_header_head">{{json_decode($preOrder->products, true)['category'] }}</span>
                                                    </div>
                                                    <div><span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span>
                                                    </div>
                                                </div>
                                                <div class="product_list_item_header ">
                                                    <span
                                                        class="product_list_item_header_head">{{json_decode($preOrder->products, true)['title'] }}</span>
                                                </div>
                                                <div class="product_option_list_item_cost">
                                                    <p>{{json_decode($preOrder->total_price, true)}} &nbsp</p>
                                                    <p> p</p>
                                                </div>
                                            </li>
                                        </ol>
                                        <div class="col product_option_list_item_date">
                                            @foreach(json_decode($preOrder->products, true)['date'] as $list)
                                                <label class="date">{{$list}}</label>
                                            @endforeach
                                        </div>
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
                                            <div class="product_list_item_header_hostel_m"><span
                                                    class="product_list_item_header_head">{{json_decode($preOrder->products, true)['category'] }}</span>
                                            </div>
                                            <div class="product_list_item_header_hostel_m">
                                                <span>
                                                    ({{json_decode($preOrder->products, true)['berth'] }} человек)

                                                </span>
                                            </div>
                                            <div class="col product_option_list_item_date_san">
                                                @foreach(json_decode($preOrder->products, true)['date'] as $list)
                                                    <label class="date">{{$list}}</label>
                                                @endforeach<br>
                                                <label
                                                    class="date">{{json_decode($preOrder->products, true)['totalPrice'] }}
                                                    р</label>
                                            </div>
                                        </div>
                                        <ol class="product_option_list_san col-5">
                                            @if((json_decode($preOrder->products, true)['productList']) !== null)
                                                @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                    <li class="product_option_list_item row">
                                                        <div class="product_list_item_header col-9">
                                                            <div
                                                                class="product_list_item_header_head">{{$list['product']}}</div>
                                                            <div class="product_option_list_item_qty">
                                                                <span>({{$list['qty']}}шт)</span>
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
                                        <p>{{json_decode($preOrder->total_price, true)}} &nbsp</p>
                                        <p> p</p>
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
                            @elseif($preOrder->role == 'sport')
                                <div class="product">
                                    <div class="product_item">
                                        <div class="product_item_header">
                                            <p class="product_item_header_name">
                                                Cпортивная база
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
                                            <div class="product_list_item_header_hostel_m"><span
                                                    class="product_list_item_header_head">{{json_decode($preOrder->products, true)['category'] }}</span>
                                            </div>
                                            <div class="product_list_item_header_hostel_m">
                                                <span>
                                                    ({{json_decode($preOrder->products, true)['berth'] }} человек)

                                                </span>
                                            </div>
                                            <div class="col product_option_list_item_date_san">
                                                @foreach(json_decode($preOrder->products, true)['date'] as $list)
                                                    <label class="date">{{$list}}</label>
                                                @endforeach<br>
                                                <label
                                                    class="date">{{json_decode($preOrder->products, true)['totalPrice'] }}
                                                    р</label>
                                            </div>
                                        </div>
                                        <ol class="product_option_list_san col-5">
                                            @if((json_decode($preOrder->products, true)['productList']) !== null)
                                                @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                    <li class="product_option_list_item row">
                                                        <div class="product_list_item_header col-9">
                                                            <div
                                                                class="product_list_item_header_head">{{$list['product']}}</div>
                                                            <div class="product_option_list_item_qty">
                                                                <span>({{$list['qty']}}шт)</span>
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
                                        <p>{{json_decode($preOrder->total_price, true)}} &nbsp</p>
                                        <p> p</p>
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
                                        <div class="product_list_item_header_hostel_m"><span
                                                class="product_list_item_header_head">{{json_decode($preOrder->products, true)['title'] }}</span>
                                        </div>
                                        <div class="product_list_item_header_hostel_m"><span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span>
                                        </div>
                                    </div>
                                    <ol class="product_option_list_tur col">
                                        <li class="product_option_list_item row">
                                            <div class="col-9">
                                                <label
                                                    class="date">{{json_decode($preOrder->products, true)['date'] }}</label>
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
                                <label>
                                    @foreach(array($totals) as $total)
                                        {{ array_sum(json_decode($total, true))}}
                                    @endforeach
                                </label>
                            </div>
                            <span>(оплата на месте)</span>
                        </div>
                        <div class="cost-item">
                            <div class="cost-item-block">
                                <p>К оплате платформе (10%):</p>
                                <label>
                                    @foreach (array($totals) as $total)
                                        {{array_sum(json_decode($total, true)) * 0.1}}
                                    @endforeach
                                </label>
                            </div>
                            <span>(оплата сейчас)</span>
                        </div>
                        @foreach(array($totals) as $total)

                            @if(array_sum(json_decode($total, true)) == 0)
                                <a style="pointer-events: none !important;
                                          opacity: 0.3;" href="{{route('payment.index')}}">
                                    <input type="submit" value="Оплатить 10%">
                                </a>
                            @else
                                <a href="{{route('payment.index')}}">
                                    <input type="submit" value="Оплатить 10%">
                                </a>
                            @endif
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
        <div class="promocodes box hide">
            @foreach($payments as $payment)
                @if($payment->status == 1)
                    <div class="order_promo">
                        <div class="order_promo_num">Заказ #{{$payment->orderId}}</div>
                        <div class="order_promo_days">({{$payment->created_at}})</div>
                    </div>
                    <div class="promo">
                        <div class=" promo-mob__box">
                            @foreach(json_decode($payment->products, true) as $items)
                                <div class="cart-section">
                                    @if($items['role'] == 'Мед.центр' || $items['role'] == 'spa' || $items['role'] == 'cafe' )
                                        @foreach(array($items['products']) as $item)
                                            @if($items['date'] > date(date("d m Y HH:mm")))
                                                <div class="section-label  section-label_promo_mob">
                                                    @if($items['role'] == 'Мед.центр')
                                                        <h2>Медицинский центр<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'spa')
                                                        <h2>Бьюти/Спа<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'cafe')
                                                        <h2>Рестораны/Кафе<br></h2>
                                                        <hr>
                                                    @endif
                                                </div>
                                                <div class="rooms">
                                                    <div class="row  align-items-center">
                                                        <div class="col-8 promo_mob d-flex align-items-center">
                                                            <div class="name_organ col-3">
                                                                <label>{{$items['name_product']}}</label><br>
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['people']))
                                                                        <p>( {{json_decode($item,true)['people']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['berth']))
                                                                        <p> ({{json_decode($item,true)['berth']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="product_promo product_promo__item col-6">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['category']))
                                                                        {{json_decode($item,true)['category']}}<br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['productList']))
                                                                        @foreach(json_decode($item,true)['productList'] as $i)
                                                                            <div
                                                                                class="d-flex justify-content-sm-between product_promo__item">
                                                                                <div class="col-6"><p
                                                                                        class="new_style_promo">{{$i['product']}}</p>
                                                                                </div>
                                                                                <div class="col-2"><p
                                                                                        class="new_style_promo">
                                                                                        ({{$i['qty']}} шт) </p></div>
                                                                                <div class="col-4"><p
                                                                                        class="new_style_promo_price">{{$i['price']}}
                                                                                        р</p></div>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="times col-3">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(gettype(json_decode($item,true)['date']) == "string")
                                                                        <div class="mob_times">{{json_decode($item,true)['date']}}<br>
                                                                        </div>
                                                                    @else
                                                                        @foreach(json_decode($item,true)['date'] as $time)
                                                                            <div class="mob_times">{{$time}}<br></div>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-4 promo_mob_style">
                                                            <div class="d-flex ml-3">
                                                                <label>Промокод:</label> &nbsp;&nbsp;&nbsp;
                                                                <label class="promocode">{{$payment->promocode}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div style="opacity: 0.5;" class="section-label section-label_promo_mob">
                                                    @if($items['role'] == 'Мед.центр')
                                                        <h2>Медицинский центр<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'spa')
                                                        <h2>Бьюти/Спа<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'cafe')
                                                        <h2>Рестораны/Кафе<br></h2>
                                                        <hr>
                                                    @endif
                                                </div>
                                                <div style="opacity: 0.5;" class="rooms">
                                                    <div class="row align-items-center">
                                                        <div class="col-8 promo_mob d-flex align-items-center">
                                                            <div class="name_organ col-3">
                                                                <label>{{$items['name_product']}}</label><br>
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['people']))
                                                                        <p>( {{json_decode($item,true)['people']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['berth']))
                                                                        <p> ({{json_decode($item,true)['berth']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="product_promo product_promo__item col-6">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['category']))
                                                                        {{json_decode($item,true)['category']}}<br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['productList']))
                                                                        @foreach(json_decode($item,true)['productList'] as $i)
                                                                            <div
                                                                                class="d-flex justify-content-sm-between product_promo__item">
                                                                                <div class="col-6"><p
                                                                                        class="new_style_promo">{{$i['product']}}</p>
                                                                                </div>
                                                                                <div class="col-2"><p
                                                                                        class="new_style_promo">
                                                                                        ({{$i['qty']}} шт) </p></div>
                                                                                <div class="col-4"><p
                                                                                        class="new_style_promo_price">{{$i['price']}}
                                                                                        р</p></div>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="times col-3">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(gettype(json_decode($item,true)['date']) == "string")
                                                                        <div class="mob_times">{{json_decode($item,true)['date']}}<br>
                                                                        </div>
                                                                    @else
                                                                        @foreach(json_decode($item,true)['date'] as $time)
                                                                            <div class="mob_times">{{$time}}<br></div>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-4 promo_mob_style">
                                                            <div class="d-flex ml-3">
                                                                <label>Промокод:</label> &nbsp;&nbsp;&nbsp;
                                                                <label class="promocode">{{$payment->promocode}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($items['role'] == 'hostel' || $items['role'] == 'sanatorium' || $items['role'] == 'sport')
                                        @foreach(array($items['products']) as $item)
                                            @if(json_decode($item,true)['date'][1]  > date(date("d m Y")) )
                                                <div class="section-label section-label_promo_mob">
                                                    @if($items['role'] == 'hostel')
                                                        <h2>Отели<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'sanatorium')
                                                        <h2>Санатории<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'sport')
                                                        <h2>Спортивная база<br></h2>
                                                        <hr>
                                                    @endif
                                                </div>
                                                <div class="rooms">
                                                    <div class="row  align-items-center">
                                                        <div class="col-8 d-flex promo_mob align-items-center">
                                                            <div class="name_organ col">
                                                                <label>{{$items['name_product']}}</label><br>
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['people']))
                                                                        <p>( {{json_decode($item,true)['people']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['berth']))
                                                                        <p> ({{json_decode($item,true)['berth']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="product_promo col-4">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['category']))
                                                                        <div
                                                                            class="d-flex justify-content-sm-between product_promo__item">
                                                                            <p>{{json_decode($item,true)['category']}}</p>
                                                                            @if(isset(json_decode($item,true)['totalPrice']))
                                                                                <p>{{json_decode($item,true)['totalPrice']}}
                                                                                    р</p>
                                                                            @else
                                                                                <p>{{ json_decode($item,true)['price']}}
                                                                                    р</p>
                                                                            @endif
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['productList']))
                                                                        @foreach(json_decode($item,true)['productList'] as $i)
                                                                            <div
                                                                                class="d-flex justify-content-sm-between product_promo__item">
                                                                                <p class="new_style_promo col-6">{{$i['product']}}</p>
                                                                                <p class="new_style_promo col-3">
                                                                                    ({{$i['qty']}} шт)</p>
                                                                                <p class="new_style_promo_price col-3 text-right">{{$i['price']}}
                                                                                    р</p>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="times col">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(gettype(json_decode($item,true)['date']) == "string")
                                                                        <div class="mob_times">{{json_decode($item,true)['date']}}<br>
                                                                        </div>
                                                                    @else
                                                                        @foreach(json_decode($item,true)['date'] as $time)
                                                                            <div class="mob_times">{{$time}}<br></div>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-4 promo_mob_style">
                                                            <div class="d-flex ml-3">
                                                                <label>Промокод:</label> &nbsp;&nbsp;&nbsp;
                                                                <label class="promocode">{{$payment->promocode}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div style="opacity: 0.5;" class="section-label section-label_promo_mob">
                                                    @if($items['role'] == 'hostel')
                                                        <h2>Отели<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'sanatorium')
                                                        <h2>Санатории<br></h2>
                                                        <hr>
                                                    @elseif($items['role'] == 'sport')
                                                        <h2>Спортивная база<br></h2>
                                                        <hr>
                                                    @endif
                                                </div>
                                                <div style="opacity: 0.5" class="rooms">
                                                    <div class="row  align-items-center">
                                                        <div class="col-8 promo_mob d-flex align-items-center">
                                                            <div class="name_organ col">
                                                                <label>{{$items['name_product']}}</label><br>
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['people']))
                                                                        <p>( {{json_decode($item,true)['people']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['berth']))
                                                                        <p> ({{json_decode($item,true)['berth']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="product_promo col-4">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['category']))
                                                                        <div
                                                                            class="d-flex justify-content-sm-between product_promo__item">
                                                                            <p>{{json_decode($item,true)['category']}}</p>
                                                                            @if(isset(json_decode($item,true)['totalPrice']))
                                                                                <p>{{json_decode($item,true)['totalPrice']}}
                                                                                    р</p>
                                                                            @else
                                                                                <p>{{ json_decode($item,true)['price']}}
                                                                                    р</p>
                                                                            @endif
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['productList']))
                                                                        @foreach(json_decode($item,true)['productList'] as $i)
                                                                            <div
                                                                                class="d-flex justify-content-sm-between product_promo__item">
                                                                                <p class="new_style_promo col-6">{{$i['product']}}</p>
                                                                                <p class="new_style_promo col-3">
                                                                                    ({{$i['qty']}} шт)</p>
                                                                                <p class="new_style_promo_price col-3 text-right">{{$i['price']}}
                                                                                    р</p>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="times col">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(gettype(json_decode($item,true)['date']) == "string")
                                                                        <div class="mob_times">{{json_decode($item,true)['date']}}<br>
                                                                        </div>
                                                                    @else
                                                                        @foreach(json_decode($item,true)['date'] as $time)
                                                                            <div class="mob_times">{{$time}}<br></div>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-4 promo_mob_style">
                                                            <div class="d-flex ml-3">
                                                                <label>Промокод:</label> &nbsp;&nbsp;&nbsp;
                                                                <label class="promocode">{{$payment->promocode}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($items['role'] == 'tur')
                                        @foreach(array($items['products']) as $item)
                                            @if((substr(json_decode($item,true)['date'], -10) < date(date("d.m.Y")) && substr(json_decode($item,true)['date'], -7) > date(date("m.Y"))) ||
                                                (substr(json_decode($item,true)['date'], -10) > date(date("d.m.Y")) && substr(json_decode($item,true)['date'], -7) > date(date("m.Y"))) ||
                                                (substr(json_decode($item,true)['date'], -10) > date(date("d.m.Y")) && substr(json_decode($item,true)['date'], -7) === date(date("m.Y")))
                                                || substr(json_decode($item,true)['date'], -4) > date(date("Y")))
                                                <div class="section-label section-label_promo_mob">
                                                    @if($items['role'] == 'tur')
                                                        <h2>Туроператоры<br></h2>
                                                        <hr>
                                                    @endif
                                                </div>
                                                <div class="rooms">
                                                    <div class="row align-items-center">
                                                        <div class="col-8 promo_mob d-flex align-items-center">
                                                            <div class="name_organ col">
                                                                <label>{{$items['name_product']}}</label><br>
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['people']))
                                                                        <p>( {{json_decode($item,true)['people']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['berth']))
                                                                        <p> ({{json_decode($item,true)['berth']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="product_promo col-4">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['category']))
                                                                        <div
                                                                            class="d-flex justify-content-sm-between product_promo__item">
                                                                            <p> {{json_decode($item,true)['category']}}</p>
                                                                            <p> {{json_decode($item,true)['price']}}р</p>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['productList']))
                                                                        @foreach(json_decode($item,true)['productList'] as $i)
                                                                            <p class="new_style_promo">{{$i['product']}}</p>
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="times col">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(gettype(json_decode($item,true)['date']) == "string")
                                                                        <div class="mob_times">{{json_decode($item,true)['date']}}<br></div>
                                                                    @else
                                                                        @foreach(json_decode($item,true)['date'] as $time)
                                                                            <div class="mob_times">{{$time}}<br></div>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-4 promo_mob_style">
                                                            <div class="d-flex ml-3">
                                                                <label>Промокод:</label> &nbsp;&nbsp;&nbsp;
                                                                <label class="promocode">{{$payment->promocode}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div style="opacity: 0.5;" class="section-label section-label_promo_mob">
                                                    @if($items['role'] == 'tur')
                                                        <h2>Туроператоры<br></h2>
                                                        <hr>
                                                    @endif
                                                </div>
                                                <div style="opacity: 0.5;" class="rooms">
                                                    <div class="row  align-items-center">
                                                        <div class="col-8 promo_mob d-flex align-items-center">
                                                            <div class="name_organ col">
                                                                <label>{{$items['name_product']}}</label><br>
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['people']))
                                                                        <p>( {{json_decode($item,true)['people']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['berth']))
                                                                        <p> ({{json_decode($item,true)['berth']}}
                                                                            человек)</p><br>
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="product_promo col-4">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(isset(json_decode($item,true)['category']))
                                                                        <div
                                                                            class="d-flex justify-content-sm-between product_promo__item">
                                                                            <p> {{json_decode($item,true)['category']}}</p>
                                                                            <p> {{json_decode($item,true)['price']}}р</p>
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                    @if(isset(json_decode($item,true)['productList']))
                                                                        @foreach(json_decode($item,true)['productList'] as $i)
                                                                            <p class="new_style_promo">{{$i['product']}}</p>
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="times col">
                                                                @foreach(array($items['products']) as $item)
                                                                    @if(gettype(json_decode($item,true)['date']) == "string")
                                                                        <div class="mob_times">{{json_decode($item,true)['date']}}<br></div>
                                                                    @else
                                                                        @foreach(json_decode($item,true)['date'] as $time)
                                                                            <div class="mob_times">{{$time}}<br></div>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-4 promo_mob_style">
                                                            <div class="d-flex ml-3">
                                                                <label>Промокод:</label> &nbsp;&nbsp;&nbsp;
                                                                <label class="promocode">{{$payment->promocode}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                @endif
            @endforeach
        </div>
    </div>
@endsection

<style>
    .new_style_promo {
        color: #505050;
        font-family: Inter;
        font-size: 14px;
        font-style: italic;
        font-weight: 400;
        line-height: normal;
    }

    .new_style_promo_price {
        color: #505050;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }
</style>
