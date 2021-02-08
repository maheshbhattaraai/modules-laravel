@inject('model', '\Modules\Channel\Entities\Channel')

@extends('backend.layouts.app')

@section('title', __('Create Channel'))

@section('content')
<x-forms.post :action="route('Channel.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Channel')
            </x-slot>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('Channel')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Channel Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Channel')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection