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
        'type' => 'email',
        'label' => 'Email',
        'required' => true,
        'default' => old('email') ?? ($item->email ?? ''),
        'error' => $errors->first('email'),
    ]" />
    @if (!isset($item))
        <x-system.form.form-group :input="[
            'name' => 'password',
            'label' => 'Password',
            'label-required' => true,
            'type' => 'password',
            'default' => old('password'),
            'error' => $errors->first('password'),
        ]" />
        <x-system.form.form-group :input="[
            'name' => 'password_confirmation',
            'label' => 'Confirm Password',
            'label-required' => true,
            'type' => 'password',
            'default' => old('password_confirmation'),
            'error' => $errors->first('password_confirmation'),
        ]" />
    @endif
@endsection
