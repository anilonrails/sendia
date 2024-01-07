<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>
    @php
        $notes = \App\Models\Note::all()->where('user_id',auth()->user()->id);
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="my-4 px-6 text-right">
                    <x-button label="Create a Note" href="{{route('notes.create')}}" primary wire:navigate  />
                </div>
                <div class="p-6 text-gray-900 ">
                    <livewire:notes.show-notes />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
