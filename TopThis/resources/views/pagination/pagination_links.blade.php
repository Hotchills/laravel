<!-- http://miftyisbored.com/tutorial-custom-pagination-templates-links-stats-laravel-5-3/ -->
@if ($paginator->hasPages())
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <span class="disabled"><span><i class="fa fa-angle-double-left"></i> Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left"></i> Previous</a>
        @endif
 
        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
            @endif
 
            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
 
        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next <i class="fa fa-angle-double-right"></i></a>
        @else
            <span class="disabled">Next <i class="fa fa-angle-double-right"></i></span>
        @endif
    </ul>
@endif
<br>