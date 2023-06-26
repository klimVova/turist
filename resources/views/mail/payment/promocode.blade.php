@component('mail::message')
    <p>Ваш промокод: {{$d['promo']}}</p>
    <p>Дата заказа : {{$d['time']}}</p>
    <p>Цена : {{$d['amount']}}</p>
    <table class="table table-striped">
        @foreach(array(($d['products'])) as $item)
            @foreach(json_decode($item,true) as $i)
                <thead>
                <tr>
                    <th scope="col"><p>Название организации: {{$i['name_product']}}</p></th>
                    <th scope="col">Название услуги</th>
                    <th scope="col">Количество людей</th>
                    <th scope="col">Цена за улслугу</th>
                </tr>
                </thead>
                @foreach(array($i['products']) as $products)
                    @if(isset(json_decode($item,true)['productList']))
                        @foreach(json_decode($products,true)['productList'] as $product)
                            <tbody>
                            <tr>
                                <th scope="row">{{$product['id']}}</th>
                                <td><p>{{$product['product']}}</p></td>
                                <td><p>{{$product['qty']}}</p></td>
                                <td><p>{{$product['price']}}</p></td>
                            </tr>
                            </tbody>
                        @endforeach
                    @else
                        <tbody>
                        <tr>
                            <th scope="row">1
{{--                                {{json_decode($products,true)['id']}}--}}
                            </th>
                            <td><p>{{json_decode($products,true)['title']}}</p></td>
                            <td><p>{{json_decode($products,true)['berth']}}</p></td>
                            @if(isset(json_decode($products,true)['price']))
                                <td><p>{{json_decode($products,true)['price']}}</p></td>
                            @else
                                <td><p>{{json_decode($products,true)['totalPrice']}}</p></td>
                    @endif
                    @if(isset(json_decode($products,true)['productList']))
                        @foreach(json_decode($products,true)['productList'] as $product)
                            <tbody>
                            <tr>
                                <th scope="row">{{$product['id']}}</th>
                                <td><p>{{$product['product']}}</p></td>
                                <td><p>{{$product['qty']}}</p></td>
                                <td><p>{{$product['price']}}</p></td>
                            </tr>
                            </tbody>
                            @endforeach
                            @else
                            @endif
                            </tr>
                            </tbody>
                            @endif
                        @endforeach
                        @endforeach
                        @endforeach
    </table>
@endcomponent
