<body>
<table border="1">
    <div>Заказ от пользователя {{$user->name}} email {{$user->email}}</div>
    @foreach($cart as $cartItem)
        <tr>
            <td>{{$cartItem->products->name}}</td>
            <td>{{$cartItem->created_at}}</td>
            <td>{{$cartItem->products->prise}}</td>
        </tr>
    @endforeach
</table>
<div class="cart-product-list__result-item">
    <div class="cart-product-list__result-item__text">Итого</div>
    <div class="cart-product-list__result-item__value">{{$sum}} рублей</div>
</div>
</body>
