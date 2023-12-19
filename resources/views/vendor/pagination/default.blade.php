

@if ($paginator->hasPages())

<ul class="news-pagination-wrap align-center mb-30 mt-30">

    @if ($paginator->onFirstPage())
        <li class="page-item disabled prev">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Prev"><i class="ti-angle-left"></i></a>
        </li>
    @else
    <li class="page-item prev">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Prev"><i class="ti-angle-left"></i></a>
        </li>
    @endif

    @if($paginator->currentPage() > 3)

    <li class="page-item count active"><a class="page-link" href="{{ $paginator->url(1) }}"> 1</a></li>
    @endif

    @if($paginator->currentPage() > 4)
    <li class="page-item count disabled" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

    @endif

    @foreach(range(1, $paginator->lastPage()) as $i)
        @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
            @if ($i == $paginator->currentPage())

                <li class="page-item active count">
                    <a class="page-link">
                    {{ $i }}
                    </a>
                </li>
            @else
                <li class="page-item count"><a class="page-link" href="{{ $paginator->url($i) }}"> {{ $i }}</a></li>
            @endif
        @endif
    @endforeach
    @if($paginator->currentPage() < $paginator->lastPage() - 3)
    <li class="page-item disabled" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

    @endif

    @if($paginator->currentPage() < $paginator->lastPage() - 2)
        <li class="page-item count"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>

    @endif


    @if ($paginator->hasMorePages())

    <li class="page-item next">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><i class="ti-angle-right"></i></a>
    </li>
    @else

    @endif


</ul>



@endif



