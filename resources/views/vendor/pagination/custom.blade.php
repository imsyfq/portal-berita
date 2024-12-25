<!-- resources/views/vendor/pagination/custom.blade.php -->
@if ($paginator->hasPages())
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {{-- arrow left and right to next and previous page --}}
                                @if ($paginator->onFirstPage())
                                    <li class="page-item disabled"><a class="page-link" href="#"><span
                                                class="flaticon-arrow roted"></span></a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $paginator->previousPageUrl() }}"><span
                                                class="flaticon-arrow roted"></span></a></li>
                                @endif

                                {{-- pagination elements --}}
                                @foreach ($elements as $element)
                                    {{-- "three dots" separator --}}
                                    @if (is_string($element))
                                        <li class="page-item disabled"><a class="page-link"
                                                href="#">{{ $element }}</a></li>
                                    @endif

                                    {{-- array of links --}}
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $paginator->currentPage())
                                                <li class="page-item active"><a class="page-link"
                                                        href="#">{{ $page }}</a></li>
                                            @else
                                                <li class="page-item"><a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- next page link --}}
                                @if ($paginator->hasMorePages())
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $paginator->nextPageUrl() }}"><span
                                                class="flaticon-arrow right-arrow"></span></a></li>
                                @else
                                    <li class="page-item disabled"><a class="page-link" href="#"><span
                                                class="flaticon-arrow right-arrow"></span></a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
