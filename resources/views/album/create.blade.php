@extends('layouts.app')

@section('title')

@if(!empty($editing) and $editing == true)
    Edit Album
@else
    Create Album
@endif

@stop

@section('content')
        <h1 class="title">
            @if(!empty($editing) and $editing == true)
                Edit Album
            @else
                Create Album
            @endif
        </h1>

        <form action="/album/save" method="POST">
            {{ csrf_field() }}

            @if(!empty($editing) and $editing == true)
                <input type="hidden" value="{{ $edit_id }}" name="edit_id">
            @endif

            <label class="label">Album Name</label>
            <p class="control">
            <input class="input" type="text" placeholder="Album Name" name="name" value="{{ $album->name or old('name') }}">
            </p>

            <label class="label">Band</label>
            <p class="control">
                <span class="select">
                    <select name="band_id">
                        <option value="">Select a Band</option>
                        @foreach($bands as $band)
                        <option value="{{$band->id}}" {{ ( isset($album) && $band->id == $album->band_id) ? 'selected' : '' }}>
                            {{$band->name}}
                        </option>
                        @endforeach
                    </select>
                </span>
            </p>

            <label class="label">Recorded</label>
            <p class="control">
                <input class="input" type="text" placeholder="1994-12-12" name="recorded_date" value="{{ $album->recorded_date or old('recorded_date')}}">
            </p>

            <label class="label">Released</label>
            <p class="control">
                <input class="input" type="text" placeholder="1994-12-12" name="release_date" value="{{ $album->release_date or old('release_date')}}">
            </p>

            <label class="label"># of Tracks</label>
            <p class="control">
                <input class="input" type="text" placeholder="16" name="number_of_tracks" value="{{ $album->number_of_tracks or '' }}">
            </p>

            <label class="label">Label</label>
            <p class="control">
                <input class="input" type="text" placeholder="Death Row Records" name="label" value="{{ $album->label or ''}}">
            </p>

            <label class="label">Producer</label>
            <p class="control">
                <input class="input" type="text" placeholder="Snoop Dogg" name="producer" value="{{ $album->producer  or ''}}">
            </p>

            <label class="label">Genre</label>
            <p class="control">
                <input class="input" type="text" placeholder="R&B" name="genre" value="{{ $album->genre or '' }}">
            </p>

            <p class="control">
                <button class="button is-primary">Save</button>
            </p>
        </form>
@stop
