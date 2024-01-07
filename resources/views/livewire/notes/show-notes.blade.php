<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with()
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get()];
    }
}; ?>
<div>
    @if($notes->isEmpty())
        <div class="text-center text-gray-500 ">
        <div class=" font-bold my-0 mb-4">There is no notes so far. Create a note to send!</div>
        <x-button primary class="px-8" href="{{route('notes.create')}}" wire:navigate>
            Create
        </x-button>
        </div>
    @else
        <div class="grid grid-cols-12 gap-4">
            @foreach($notes as $note)
                <div wire:key="{{$note->title}}{{now()}}" class="my-4 col-span-12 lg:col-span-6">
                    <x-card class="hover:shadow-lg transition duration-200" title="{{$note->title}}">
                        <div class="flex justify-between items-center">
                            <p>{{$note->body}}</p>
                            <p class="text-gray-600 text-sm italic">{{\Carbon\Carbon::parse($note->send_date)->format('d/M/Y')}}</p>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-sm">Recipient: <span class="font-semibold">{{$note->recipient}}</span></p>
                            <div>
                                <x-button.circle icon="eye"/>
                                <x-button.circle icon="trash"/>
                            </div>
                        </div>
                    </x-card>
                </div>
            @endforeach
        </div>
    @endif
</div>
