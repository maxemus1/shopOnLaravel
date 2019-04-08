<body>
<table border="1">
    @foreach($cart as $cartItem)
        <tr>
            <td>{{$cartItem->products->name}}</td>
            <td>{{$cartItem->created_at}}</td>
            <td>{{$cartItem->products->prise}}</td>
        </tr>
    @endforeach
</table>
</body>
