<div class="modal fade" id="showQuestionModel{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">
                    Questionaire</h4>
                <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body message-body">
                <div class="container">
                    <label>Title: {{$item->title}} </label>
                    <label class="pull-right">Expiry Date: {{$item->expiry_date}} </label>
                    <h1 class="text-center">Physics Question</h1>
                    @foreach ($item->physicsQuestions as $questionsKey => $questionData)
                    <div class="card" style="margin-bottom: 0px">
                        <div class="card-body">
                            <p class="card-text">{{listFormatting(SN(pageIndex($questionData), $questionsKey)). $questionData->question }}</p>
                            <ul class="list-group list-group-flush">
                                @php
                                $optionIncrement = 'a';
                                @endphp
                                @foreach (json_decode($questionData->options, true) as $questionOptionJey => $questionOptionData)
                                <li class="list-group-item">
                                    {{ listFormatting($optionIncrement) . $questionOptionData[$optionIncrement] }}
                                </li>
                                @php
                                $optionIncrement = chr(ord($optionIncrement) + 1);
                                @endphp
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-body message-body">
                <div class="container">
                    <h1 class="text-center">Chemistry Question</h1>
                    @foreach ($item->chemistryQuestions as $questionsKey => $questionData)
                    <div class="card" style="margin-bottom: 0px">
                        <div class="card-body">
                            <p class="card-text">{{listFormatting(SN(pageIndex($questionData), $questionsKey)). $questionData->question }}</p>
                            <ul class="list-group list-group-flush">
                                @php
                                $optionIncrement = 'a';
                                @endphp
                                @foreach (json_decode($questionData->options, true) as $questionOptionJey => $questionOptionData)
                                <li class="list-group-item">
                                    {{ listFormatting($optionIncrement) . $questionOptionData[$optionIncrement] }}
                                </li>
                                @php
                                $optionIncrement = chr(ord($optionIncrement) + 1);
                                @endphp
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                    <em class="glyph-icon icon-close"></em>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>