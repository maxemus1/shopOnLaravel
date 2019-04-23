@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск,
                скачать Steam игры после оплаты
            </div>
            <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
        </div>
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
                </div>
                <div class="content-head__search-block">
                    <div class="search-container">
                        <form class="search-container__form">
                            <input type="text" class="search-container__form__input">
                            <button class="search-container__form__btn">search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="cart-product-list">
                    @foreach($date as $dateOrders=>$orders)
                        <div class="cart-product-list__item">
                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content">Заказ от</div>
                            </div>
                            <div class="cart-product__item__cart-date">
                                <div class="cart-product__item__cart-date__content">{{$dateOrders}}</div>
                            </div>
                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content"><a
                                            href="{{route('orders.single',['date'=>$dateOrders])}}">Просмотреть</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-bottom">
            <div class="line"></div>
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">
                    @foreach($randomProducts as $product)
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product">
                                <a href="{{route('products.single',['products'=>$product])}}"
                                   class="products-columns__item__title-product__link">{{$product->name}}</a>
                            </div>
                            <div class="products-columns__item__thumbnail">
                                <a href="{{route('products.single',['products'=>$product])}}"
                                   class="products-columns__item__thumbnail__link">
                                    <img src="{{$product->getPicture()}}" alt="Preview-image"
                                         class="products-columns__item__thumbnail__img">
                                </a>
                            </div>
                            <div class="products-columns__item__description">
                                <span class="products-price">{{$product->prise}}руб.</span>
                                <a href="{{route('cart.addToCart',['products'=>$product])}}" class="btn btn-blue">Купить
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection