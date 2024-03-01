<?php
use function Livewire\Volt\{state};
use function Laravel\Folio\name;

name('admin.home');

?>
<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>
    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>
