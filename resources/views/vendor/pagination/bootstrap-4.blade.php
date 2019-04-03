@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-nav__item"><span class="page-nav__item__link__disabled ">&laquo;</span></li>
        @else
            <li class="page-nav__item"><a class="page-nav__item__link" href="{{ $paginator->previousPageUrl() }}"
                                          rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-nav__item"><span class="page-nav__item__link__disabled ">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-nav__item"><span class="page-nav__item__link__active">{{ $page }}</span></li>
                    @else
                        <li class="page-nav__item"><a class="page-nav__item__link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-nav__item"><a class="page-nav__item__link" href="{{ $paginator->nextPageUrl() }}"
                                          rel="next">&raquo;</a></li>
        @else
            <li class="page-nav__item"><span class="page-nav__item__link__disabled ">&raquo;</span></li>
        @endif
    </ul>
@endif
