@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bears.update', $bear->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="patch">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id" value="{{ $bear->id }}" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label>Naam</label>
                        <input type="text" class="form-control" name="name" value="{{ $bear->name }}">
                    </div>
                    <div class="form-group">
                        <label>Stad</label>
                        <input type="text" class="form-control" name="city" value="{{ $bear->city }}">
                    </div>
                    <div class="form-group">
                        <label>Regio</label>
                        <input type="text" class="form-control" name="region" value="{{ $bear->region }}">
                    </div>
                    <div class="form-group">
                        <label>Lengtegraad</label>
                        <input type="text" class="form-control" name="latitude" value="{{ $bear->latitude }}">
                    </div>
                    <div class="form-group">
                        <label>Breedtegraad</label>
                        <input type="text" class="form-control" name="longitude" value="{{ $bear->longitude }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sla op</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection