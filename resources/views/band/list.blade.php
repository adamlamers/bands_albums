@extends('layouts.app')

@section('title')
Band List
@stop

@section('content')
        <h1 class="title">Bands</h1>
        <table class="table is-striped is-bordered sortable">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Start Date</td>
                    <td>Website</td>
                    <td>Still Active</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($bands as $band)
                <tr>
                    <td>{{ $band->name }}</td>
                    <td>{{ $band->start_date }}</td>
                    <td>{{ $band->website }}</td>
                    <td>{{ ($band->still_active) ? 'Yes' : 'No' }}</td>
                    <td><a href="/band/{{ $band->id }}/edit" class="button is-primary">Edit</a></td>
                    <td><a href="/band/{{ $band->id }}/delete" class="button is-danger">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    <a class="button is-primary is-pulled-right" href="/band/create"> Create a new Band </a>
@stop
