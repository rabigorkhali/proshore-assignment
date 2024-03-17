
@extends('system.layouts.listing')
@section('header')
<x-system.search-form :action="url($indexUrl)">
    <x-slot name="inputs">
        <x-system.form.form-inline-group :input="['name' => 'keyword', 'label' => 'Search keyword', 'default' => Request::get('keyword')]" />
    </x-slot>
</x-system.search-form>
@endsection

@section('table-heading')
<tr>
    <th scope="col">S.N</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Action</th>
</tr>
@endsection

@section('table-data')
@php $pageIndex = pageIndex($items); @endphp
@foreach($items as $key=>$item)
<tr>
    <td>{{SN($pageIndex, $key)}}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->email }}</td>
    <td>
        @include('system.partials.editButton')
        @include('system.partials.deleteButton')
        <x-system.general-modal :url="url($indexUrl.'/reset-password/'.$item->id)"
                                :modalTitle="'Password Reset'"
                                :modalId="'passwordReset'.$item->id"
                                :modalTriggerButton="'Reset-Password'"
                                :buttonClass="'btn-warning'"
                                :buttonIconClass="' fa fa-key'"
                                :submitButtonTitle="'Reset'">
            <x-slot name="body">
                <input type="hidden" name="id" value="{{$item->id}}">
                @include('system.partials.errors')
                <div class="form-group row">
                    <div class="col-sm-4 col-form-label">
                        <label for="name" class="control-label">New Password</label> <span style="color:red;">*</span>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter your new password " required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col-form-label">
                        <label for="name" class="control-label">Confirm Password</label>
                        <span style="color:red;">*</span>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="password_confirmation" class="form-control" autocomplete="off" placeholder="Enter your confirm password " required>
                    </div>
                </div>
            </x-slot>
        </x-system.general-modal>
    </td>
</tr>
@endforeach
@endsection
@section('scripts')
<script>
    let error = `{{ $errors->first('password')}}`
    let oldId = `{{ old('id') }}`
    if (error !== "") {
        $('#passwordReset' + oldId).modal('show')
    }
</script>
@endsection
