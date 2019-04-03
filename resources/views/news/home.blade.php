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
                    <div class="content-head__title-wrap__title bcg-title">Новости</div>
                </div>
                @include('layouts.search')
            </div>
            <div class="content-main__container">
                <div class="products-columns">
                    @foreach($news as $new)
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product">
                                <a href="{{route('news.show',['id'=>$new->id])}}"
                                   class="products-columns__item__title-product__link">{{$new->name}}</a>
                            </div>
                            <div class="products-columns__item__thumbnail">
                                <a href="{{route('news.show',['id'=>$new->id])}}"
                                   class="products-columns__item__thumbnail__link">
                                    <img src="{{$new->getPicture()}}" alt="Preview-image"
                                         class="products-columns__item__thumbnail__img">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="content-footer__container">
                <ul class="page-nav">
                    {{$news->links( "pagination::bootstrap-4")}}
                </ul>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection