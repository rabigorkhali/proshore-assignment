@extends('system.layouts.form')
@section('inputs')
    <x-system.form.form-group :input="[
        'name' => 'title',
        'required' => 'true',
        'id' => 'title',
        'label' => 'Page Title',
        'default' => $item->title ?? old('title'),
        'error' => $errors->first('title'),
    ]" />
    <x-system.form.form-group :input="[
        'name' => 'expiry_date',
        'required' => 'true',
        'id' => 'title',
        'type' => 'date',
        'label' => 'Expiry Date',
        'default' => $item->expiry_date ?? old('expiry_date'),
        'error' => $errors->first('expiry_date'),
    ]" />

@endsection

@section('scripts')
@endsection
