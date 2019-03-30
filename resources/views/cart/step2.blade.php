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
                    @foreach($cart as $cartItem)
                        <div class="cart-product-list__item">
                            <div class="cart-product__item__product-photo"><img src="{{$cartItem->products->picture}}"
                                                                                class="cart-product__item__product-photo__image">
                            </div>
                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content"><a
                                            href="#">{{$cartItem->products->name}}</a></div>
                            </div>
                            <div class="cart-product__item__cart-date">
                                <div class="cart-product__item__cart-date__content">{{$cartItem->created_at}}</div>
                            </div>
                            <div class="cart-product__item__product-price"><span
                                        class="product-price__value">{{$cartItem->products->prise}} руб.</span></div>
                        </div>
                    @endforeach
                </div>
                <div class="cart-product-list__result-item">
                    <div class="cart-product-list__result-item__text">Итого</div>
                    <div class="cart-product-list__result-item__value">{{$sum}} рублей</div>
                </div>
            </div>
            <div class="content-footer__container">
                <div class="btn-buy-wrap"><a href="#" class="btn-buy-wrap__btn-link">Перейти к оплате</a></div>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection