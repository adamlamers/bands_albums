@extends('layouts.app')

@section('title')
Album List
@stop

@section('content')
        <h1 class="title">Albums</h1>
        <table class="table is-striped is-bordered sortable">
            <thead>
                <tr>
                    <td>Band</td>
                    <td>Album Name</td>
                    <td>Recorded</td>
                    <td>Released</td>
                    <td># of Tracks</td>
                    <td>Label</td>
                    <td>Producer</td>
                    <td>Genre</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($albums as $album)
                <tr>
                    <td>{{ $album->band->name }}</td>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->recorded_date }}</td>
                    <td>{{ $album->release_date }}</td>
                    <td>{{ $album->number_of_tracks }}</td>
                    <td>{{ $album->label }}</td>
                    <td>{{ $album->producer }}</td>
                    <td>{{ $album->genre }}</td>
                    <td><a href="/album/{{ $album->id }}/edit" class="button is-primary">Edit</a></td>
                    <td><a href="/album/{{ $album->id }}/delete" class="button is-danger">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    <a class="button is-primary is-pulled-right" href="/album/create"> Create a new Album </a>
@stop
