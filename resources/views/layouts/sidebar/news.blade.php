<div class="sidebar-item">
    <div class="sidebar-item__title">Последние новости</div>
    <div class="sidebar-item__content">
        <div class="sidebar-news">
            @foreach($lastNews as $news)
                <div class="sidebar-news__item">
                    <div class="sidebar-news__item__preview-news"><img src="{{$news->getPicture()}}" alt="image-new"
                                                                       class="sidebar-new__item__preview-new__image">
                    </div>
                    <div class="sidebar-news__item__title-news"><a href="{{route('news.show',['id'=>$news->id])}}"
                                                                   class="sidebar-news__item__title-news__link">{{$news->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>