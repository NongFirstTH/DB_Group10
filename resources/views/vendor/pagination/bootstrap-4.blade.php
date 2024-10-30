<ul class="flex space-x-2">
  {{-- Previous Page Link --}}
  @if ($paginator->onFirstPage())
  <li class="disabled"><span class="px-4 py-2 border border-black text-gray-400">&laquo;</span></li>
  @else
  <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"
      class="bg-black text-white border border-black px-4 py-2 hover:bg-gray-700">&laquo;</a></li>
  @endif

  {{-- Pagination Elements --}}
  @foreach ($elements as $element)
  @if (is_string($element))
  <li class="disabled"><span class="px-4 py-2 border border-black text-gray-400">{{ $element }}</span></li>
  @endif

  @if (is_array($element))
  @foreach ($element as $page => $url)
  @if ($page == $paginator->currentPage())
  <li class="active"><span class="bg-black text-white border border-black px-4 py-2">{{ $page }}</span></li>
  @else
  <li><a href="{{ $url }}" class="bg-black text-white border border-black px-4 py-2 hover:bg-gray-700">{{ $page }}</a>
  </li>
  @endif
  @endforeach
  @endif
  @endforeach

  {{-- Next Page Link --}}
  @if ($paginator->hasMorePages())
  <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"
      class="bg-black text-white border border-black px-4 py-2 hover:bg-gray-700">&raquo;</a></li>
  @else
  <li class="disabled"><span class="px-4 py-2 border border-black text-gray-400">&raquo;</span></li>
  @endif
</ul>