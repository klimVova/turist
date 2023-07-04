@component('mail::message')
    <p>Промокод покупателя{{$message['surname']}} {{$message['name']}} : {{$message['promo']}}</p>
    <p>Телефон: {{$message['phone']}} </p>
    <p>Дата заказа : {{$message['time']}}</p>
    <p>Цена : {{$message['amount']}}</p>
    <table class="table">
        @foreach(array(($message['products'])) as $item)
            @foreach(json_decode($item,true) as $i)
                @if($message['email'] === $i['organization_email'])
                    <thead>
                    <tr>
                        <th scope="col"><p>Название организации: {{$i['name_product']}}</p>
                        </th>
                        <th scope="col">Название услуги</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена за улслугу</th>
                    </tr>
                    </thead>
                    @foreach(array($i['products']) as $products)
                        @if(isset(json_decode($item,true)['productList']))
                            @foreach(json_decode($products,true)['productList'] as $product)
                                <tbody>
                                <tr>
                                    <td>{{$product['id']}}</td>
                                    <td>{{$product['product']}}</td>
                                    <td>{{$product['qty']}}</td>
                                    <td>{{$product['price']}}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        @else
                            <tbody>
                            <tr>
                                @if(isset(json_decode($products,true)['id']))
                                    <td>{{json_decode($products,true)['id']}}</td>
                                    <td>{{json_decode($products,true)['title']}}</td>
                                    <td>{{json_decode($products,true)['berth']}}</td>
                                    @if(isset(json_decode($products,true)['price']))
                                        <td>{{json_decode($products,true)['price']}}</td>
                                    @else
                                        <td>{{json_decode($products,true)['totalPrice']}}</td>
                                    @endif
                                @else
                                @endif
                            </tr>
                            </tbody>
                        @endif
                        @if(isset(json_decode($products,true)['productList']))
                            @foreach(json_decode($products,true)['productList'] as $product)
                                <tbody>
                                <tr>
                                    <th scope="row">{{$product['id']}}</th>
                                    <td>{{$product['product']}}</td>
                                    <td>{{$product['qty']}}</td>
                                    <td>{{$product['price']}}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        @else
                        @endif
                    @endforeach
                @else
                @endif
            @endforeach
        @endforeach
    </table>

@endcomponent

