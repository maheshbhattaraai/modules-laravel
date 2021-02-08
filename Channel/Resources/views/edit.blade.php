@inject('model', '\Modules\Channel\Entities\Channel')

@extends('backend.layouts.app')

@section('title', __('Update Channel'))

@section('content')
    <x-forms.patch :action="route('Channel.update', $channel->id)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Channel')
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
                            <input type="text"  name="name" class="form-control" placeholder="{{ __('Channel Name') }}" value="{{ old('name') ?? $channel->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                    <small class="float-right text-muted">
                    <strong style="margin-left: 15px;">@lang('Channel Created On'):</strong> {{date("jS F , Y H:i A", strtotime($channel->created_at))}}
                    <br>
                    <strong style="margin-left: 15px;">@lang('Last updated On'):</strong> {{date("jS F , Y H:i A", strtotime($channel->updated_at))}}
                    <small>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Channel')</button>
            </x-slot>
            
        </x-backend.card>
    </x-forms.patch>
@endsection
