@extends('system.layouts.listing')
@section('header')
    <x-system.search-form :action="$indexUrl">
        <x-slot name="inputs">
            <x-system.form.form-inline-group :input="['name' => 'keyword', 'placeholder' => 'Keyword', 'default' => Request::get('keyword')]"></x-system.form.form-inline-group>
        </x-slot>
    </x-system.search-form>
@endsection

@section('table-heading')
    <tr>
        <th scope="col">{{ 'S.N' }}</th>
        <th scope="col">{{ 'Title' }}</th>
        <th scope="col">{{ 'Expiry Date' }}</th>
        <th scope="col">{{ 'Action' }}</th>
    </tr>
@endsection

@section('table-data')
    @php $pageIndex = pageIndex($items); @endphp
    @foreach ($items as $key => $item)
        <tr>
            <td>{{ SN($pageIndex, $key) }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->expiry_date }}</td>
            <td>
                @include('system.partials.editButton')
                @include('system.partials.deleteButton')
                <button type="button" class="btn btn-info btn-sm mb-1" data-bs-toggle="modal"
                    data-bs-target="#showQuestionModel{{ $item->id }}" data-toggle="tooltip" data-placement="top"
                    title="Questions">
                    <em class="fa fa-eye"></em> Questions
                </button>
            </td>
        </tr>
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
    @endforeach
@endsection

@section('scripts')
@endsection
