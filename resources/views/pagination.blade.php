@if ($paginator->hasPages())

<ul class="pagination justify-content-center mt-3">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class=" disabled page-item"><a class="page-link" href="#" aria-label="Previous"><i
                class="fa fa-angle-left"></i></a></li>
    @else
    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                class="fa fa-angle-left"></i></a></li>
    @endif
    {{-- Pagination Elements --}}

    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="disabled"><span>{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item"><a class="page-link active">{{ $page }}</a></li>
    @else
    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}

    @if ($paginator->hasMorePages())
    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                class="fa fa-angle-right"></i></a></li>
    @else
    <li class="disabled page-item"><a class="page-link" href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a>
    </li>
    @endif

</ul>


@endif