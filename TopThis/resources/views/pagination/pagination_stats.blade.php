
@if ($paginator->hasPages())
    Showing <strong>{{ ((($paginator->currentPage() -1) * $paginator->perPage()) + 1) }}</strong> to <strong>{{ ((($paginator->currentPage() -1) * $paginator->perPage()) + $paginator->count()) }}</strong> of <strong>{{ $paginator->total() }}</strong> entries. page <strong>{{ $paginator->currentPage() }}</strong> /<strong>{{ $paginator->lastPage() }}</strong>
@endif