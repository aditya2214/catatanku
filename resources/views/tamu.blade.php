@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tamu</div>

                <div class="card-body">
                    <livewire:pengunjung-index></livewire:pengunjung-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
