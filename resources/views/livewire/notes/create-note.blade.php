<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle'=>'required|string|min:2',
            'noteBody'=>'required|string|min:10',
            'noteRecipient'=>'required|email',
            'noteSendDate'=>'required|date'
        ]);
        if ($validated)
        {
            auth()->user()->notes()->create([
                'title'=>$validated['noteTitle'],
                'body'=>$validated['noteBody'],
                'recipient'=>$validated['noteRecipient'],
                'send_date'=>$validated['noteSendDate'],
            ]);
            redirect()->route('notes.index');
        }
        else{
            dd("Failure");
        }
    }
}; ?>

<div class="px-8">
    <h2 class="text-center text-primary-500 font-semibold mb-6 ">Create a Note</h2>
    <div class="mb-6 mt-3 px-8">
        <x-button icon="arrow-left" label="Back to Notes" href="{{route('notes.index')}}" wire:navigate />
    </div>
    <form wire:submit.prevent="submit" class="px-8 flex flex-col flex-1 gap-4 mb-6">
        <x-input wire:model="noteTitle" label="Note Title" placeholder="Its been great day" />
        <x-textarea wire:model="noteBody" label="Note Body" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, minima!"/>
        <x-input wire:model="noteRecipient" label="Note Recipient" placeholder="adam.smith@gmail.com" />
        <x-input wire:model="noteSendDate" type="date" label="Sending Date" placeholder="2023/01/23" />
        <x-button type="submit" label="Create" primary  spinner />
    </form>
</div>
