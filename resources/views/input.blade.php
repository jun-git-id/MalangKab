@extends('layouts.app')

@section('content')

    <div class="container">
        <form>
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-store"></i></span>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Toko">
            </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </div>
        </form>
    </div>
    @endsection
