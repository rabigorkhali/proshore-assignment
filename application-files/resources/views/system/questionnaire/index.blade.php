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
        @include('system.questionnaire.questionListModal')
    @endforeach
@endsection

@section('scripts')
@endsection
