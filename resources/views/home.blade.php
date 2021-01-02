@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="margin:10px; position:fixed; left:82%; top:10%;" class="col-xl-2 fixed-top">
            <div class="card">
                <div class="card-header">
                    <form action="{{ url ('print') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="">Initial Parameter </label>
                            <input type="date" name="initial_prameter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Final Parameter </label>
                            <input type="date" name="final_parameter" class="form-control">
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm">Print Report</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12`">
            <div class="card">
                <div class="card-header">Catatanku SPA</div>

                <div class="card-body">
                    
                    <livewire:home-index></livewire:home-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
