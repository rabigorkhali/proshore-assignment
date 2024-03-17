<div class="modal fade" id="sendEmailToStudent{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{route('questionnaires.mail.student',$item->id)}}">
            <div class="modal-content">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        Confirmation Message</h4>
                    <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body message-body">
                    Are you sure you want to mail this questionnaire all the students?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                        <em class="glyph-icon icon-close"></em>
                        Close
                    </button>
                    <button type="submit" class="btn btn-sm btn-info">
                        <em class="glyph-icon icon-trash"></em>
                        Send </button>
                </div>
            </div>
        </form>
    </div>
</div>
