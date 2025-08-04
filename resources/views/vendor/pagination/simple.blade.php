@if ($paginator->hasPages())
    <nav>
        <div class="pagination-wrapper">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="pagination-disabled">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                    </svg>
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                    </svg>
                    Previous
                </a>
            @endif

            {{-- Results Info --}}
            <div class="pagination-info">
                Showing
                <span class="pagination-number">{{ $paginator->firstItem() }}</span>
                to
                <span class="pagination-number">{{ $paginator->lastItem() }}</span>
                of
                <span class="pagination-number">{{ $paginator->total() }}</span>
                results
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">
                    Next
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z"/>
                    </svg>
                </a>
            @else
                <span class="pagination-disabled">
                    Next
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z"/>
                    </svg>
                </span>
            @endif
        </div>
    </nav>
@endif 