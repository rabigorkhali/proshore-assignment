@if(!$items->isEmpty())
    @if(method_exists($items, 'perPage') && method_exists($items, 'currentPage'))
        <div class="pagination-tile">
            <label class="pagination-sub" style="display: block">
                Showing {{($items->currentpage()-1)*$items->perpage()+1}} to {{(($items->currentpage()-1)*$items->perpage())+$items->count()}} of {{$items->total()}} entries
            </label>
            <ul class="pagination">
                {!! str_replace('/?', '?',$items->appends([Request::input()])->render()) !!}
            </ul>
        </div>
    @endif
@endif
