@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <a href="{{ route('bears.create') }}" class="btn btn-success">Maak een nieuwe beer aan</a>
                <hr>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Stad</th>
                        <th>Regio</th>
                        <th>Lengtegraad</th>
                        <th>Breedtegraad</th>
                        <th>Wijzigen</th>
                        <th>Verwijderen</th>
                    </tr>
                    @foreach($bears as $bear)
                        <tr>
                            <td>{{ $bear->id }}</td>
                            <td>{{ $bear->name }}</td>
                            <td>{{ $bear->city }}</td>
                            <td>{{ $bear->region }}</td>
                            <td>{{ $bear->latitude }}</td>
                            <td>{{ $bear->longitude }}</td>
                            <td><a href="{{ route('bears.edit', $bear->id) }}"><i class="fas fa-edit"></i></a></td>
                            <td><a href="{{ route('bears.destroy', $bear->id) }}" class="bear-delete-button" data-bear="{{ $bear->id }}"><i class="fas fa-trash-alt"></i></a></td>
                            <form id="destroy-form-{{ $bear->id }}" action="{{ route('bears.destroy', $bear->id) }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                            </form>
                        </tr>
                    @endforeach
                </table>

                {{ $bears->links() }}

            </div>
        </div>
    </div>
@endsection