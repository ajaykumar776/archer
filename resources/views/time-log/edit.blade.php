<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Time Log') }}
        </h2>
    </x-slot>

    @livewire('employee-time-log-form', ['timeLogId' => $id])
    </x-app-layout>
