@extends('layouts.main')

@section('child')

    {{-- Content --}}
    <div class="col-md-10 mx-auto my-md-5">

        <h6 class="text-muted mb-md-5">{{ $title }}</h6>

        {{-- @include('partials.addPolling') --}}
        @include('partials/poll_items/poll-header-items')

        {{-- Polling item --}}
        <div class="card border-light rounded-3 shadow-sm">

            <div class="card-body">
                {{-- <livewire:store-items :vote_unit={{ $vote_unit }}/> --}}
                <hr>
                {{-- <livewire:items :unit={{ $unit }}/> --}}
                {{-- @include('partials/poll_items/poll-content-items') --}}
            </div>

        </div>

    </div>

@endsection
