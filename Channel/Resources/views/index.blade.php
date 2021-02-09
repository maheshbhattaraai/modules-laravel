@extends('backend.layouts.app')

@section('title', __('Create Channel'))

@section('content')
<x-backend.card>
        <x-slot name="header">
            @lang('Channel Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('Channel.create')"
                    :text="__('Create Channel')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire::backend.channels-table />
        </x-slot>
    </x-backend.card>
@endsection
