@if ($paginator->hasPages())
    <nav class="pager" role="navigation" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="disabled"><i class="bi bi-chevron-left"></i></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="bi bi-chevron-left"></i></a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="disabled">{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="current">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="bi bi-chevron-right"></i></a>
        @else
            <span class="disabled"><i class="bi bi-chevron-right"></i></span>
        @endif
    </nav>
@endif
