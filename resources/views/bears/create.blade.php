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

                <form action="{{ route('bears.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Naam</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Stad</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-group">
                        <label>Regio</label>
                        <input type="text" class="form-control" name="region">
                    </div>
                    <div class="form-group">
                        <label>Lengtegraad</label>
                        <input type="text" class="form-control" name="latitude">
                    </div>
                    <div class="form-group">
                        <label>Breedtegraad</label>
                        <input type="text" class="form-control" name="longitude">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Maak aan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection