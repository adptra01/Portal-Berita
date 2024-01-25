<?php

use function Livewire\Volt\{state};

state(['count' => 0]);

$increment = fn() => $this->count++;

?>

<div>
    {{-- panggil dengan <livewire:counter> --}}
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
</div>
