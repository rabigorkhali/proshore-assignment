
@extends('system.layouts.form')
@section('inputs')
    <x-system.form.form-group :input="[
        'name' => 'name',
        'label' => 'Name',
        'required' => true,
        'default' => old('name') ?? ($item->name ?? ''),
        'error' => $errors->first('name'),
    ]" />
    <x-system.form.form-group :input="[
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email',
        'required' => true,
        'default' => old('email') ?? ($item->email ?? ''),
        'error' => $errors->first('email'),
    ]" />
@endsection
