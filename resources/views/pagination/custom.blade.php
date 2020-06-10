@if ($paginator->hasPages())
    
    <nav class="m-auto" aria-label="...">
        <ul class="pagination shadow-sm mt-5">
            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span><span class="sr-only">(current)</span></li>
                        @else
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="page-item"><a class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a></li>
            @endif
        </ul>
    </nav>

@endif
