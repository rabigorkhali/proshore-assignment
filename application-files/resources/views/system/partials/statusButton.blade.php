    <button class="update-button btn {{!empty($item->status) ? 'btn-primary' : 'btn-danger'}}"
            data-update-url="{{url($indexUrl.'/'.$item->id.'/toggle-status')}}">
        <em class="fa fa-refresh"></em>
        @if ($item->status)
            {{('Active') }}
        @else
            {{('In-Active') }}
        @endif
    </button>
