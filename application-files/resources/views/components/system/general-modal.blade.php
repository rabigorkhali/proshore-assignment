@props(['url', 'modalTitle', 'modalId', 'buttonClass', 'submitButtonTitle', 'modalTriggerButton', 'buttonIconClass'])

<button type="button" class="btn {{$buttonClass}} mb-1 btn-sm" data-bs-toggle="modal" data-bs-target="#{{$modalId}}">
@if(isset($buttonIconClass))<em class="fa {{$buttonIconClass}}"></em>@endif  {{$modalTriggerButton}}
</button>

<!-- Modal -->
<div class="modal fade" id="{{$modalId}}" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
    <form method="post" action="{{$url}}" enctype="multipart/form-data">
      <div class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="{{ $modalId }}">{{$modalTitle}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{$body}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn {{$buttonClass}}">{{$submitButtonTitle}}</button>
        </div>
      </div>
    </form>
  </div>
</div>
