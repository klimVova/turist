@component('mail::message')
    <p>Новая заявка от: {{$dd['name']}}</p>
    <p>Дата заявки : {{$dd['time']}}</p>
    <p>Cообщение : {{$dd['messages']}}</p>
    <p>Почта : {{$dd['email']}}</p>
    <p>Телефон : {{$dd['phone']}}</p>
{{--    <p>Цена : {{$d['amount']}}</p>--}}
@endcomponent
