@extends('frontend.main')
@section('form')
    <form method="post" action="{{ route('save.exam.form') }}">
        @csrf
        <input type="hidden" value="{{$questionnaires->id}}" name="questionnaire">
        <input type="hidden" value="{{$student->id}}" name="student">
        <div class="modal-body message-body">
            <div class="container">
                <h1 class="text-center">{{ $questionnaires->title }} </h1>
                <label>Student Name: {{ $student->name }} </label><br>
                <label>Student Email: {{ $student->email }} </label>
                <label class="pull-right">Expiry Date: {{ $questionnaires->expiry_date }} </label>
                <h3 class="text-center mt-4">Physics Question</h3>
                @foreach ($questionnaires->physicsQuestions as $questionsKey => $questionData)
                    <div class="card" style="margin-bottom: 0px">
                        <div class="card-body">
                            <p class="card-text">
                                {{ listFormatting(SN(pageIndex($questionData), $questionsKey)) . $questionData->question }}
                            </p>
                            <ul class="list-group list-group-flush">
                                @php
                                    $optionIncrement = 'a';
                                @endphp
                                @foreach (json_decode($questionData->options, true) as $questionOptionKey => $questionOptionData)
                                    <li class="list-group-item">
                                        <input type="radio" value="{{$optionIncrement}}" name="{{ $questionData->id }}">
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
                <h3 class="text-center">Chemistry Question</h3>
                @foreach ($questionnaires->chemistryQuestions as $questionsKey => $questionData)
                    <div class="card" style="margin-bottom: 0px">
                        <div class="card-body">
                            <p class="card-text">
                                {{ listFormatting(SN(pageIndex($questionData), $questionsKey)) . $questionData->question }}
                            </p>
                            <ul class="list-group list-group-flush">
                                @php
                                    $optionIncrement = 'a';
                                @endphp
                                @foreach (json_decode($questionData->options, true) as $questionOptionJey => $questionOptionData)
                                    <li class="list-group-item">
                                        <input value="{{$optionIncrement}}" type="radio" name="{{ $questionData->id }}">
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
        <button type="submit" class="btn btn-sm btn-info">Submit</button>
    </form>
@endsection
