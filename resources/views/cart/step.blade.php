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
                    @foreach($cartInfo->getCart() as $cartItem)
                        <div class="cart-product-list__item">
                            <div class="cart-product__item__product-photo"><img src="{{$cartItem->products->picture}}"
                                                                                class="cart-product__item__product-photo__image">
                            </div>
                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content"><a
                                            href="{{route('products.single',['products'=>$cartItem->products])}}">{{$cartItem->products->name}}</a></div>
                            </div>
                            <div class="cart-product__item__cart-date">
                                <div class="cart-product__item__cart-date__content">{{$cartItem->created_at}}</div>
                            </div>
                            <div class="cart-product__item__product-price"><span
                                        class="product-price__value">{{$cartItem->products->prise}} руб.</span></div>
                            <div
                                    class="cart-product__item__product-del-icon">
                                <a href="{{route('cart.destroy',['id'=>$cartItem->id])}}" class="logotype-link">
                                    <img src="/img/del-icon.png">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="cart-product-list__result-item">
                    <div class="cart-product-list__result-item__text">Итого</div>
                    <div class="cart-product-list__result-item__value">{{$cartInfo->getSum()}} рублей</div>
                </div>
            </div>
            <div class="content-footer__container">
                <div class="btn-buy-wrap"><a href="{{route('mail')}}" class="btn-buy-wrap__btn-link">Оформить заказ</a></div>
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