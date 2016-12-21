@extends('layouts.app')

@section('title')

@if(!empty($editing) and $editing == true)
    Edit Band
@else
    Create Band
@endif

@stop

@section('content')
        <h1 class="title">
            @if(!empty($editing) and $editing == true)
                Edit Band
            @else
                Create Band
            @endif
        </h1>

        <form action="/band/save" method="POST">
            {{ csrf_field() }}

            @if(!empty($editing) and $editing == true)
                <input type="hidden" value="{{ $edit_id }}" name="edit_id">
            @endif

            <label class="label">Band Name</label>
            <p class="control">
            <input class="input" type="text" placeholder="Band Name" name="name" value="{{ $band->name or old('name') }}">
            </p>

            <label class="label">Start Date</label>
            <p class="control">
            <input class="input" type="text" placeholder="1994-12-12" name="start_date" value="{{ $band->start_date or old('start_date') }}">
            </p>

            <label class="label">Website</label>
            <p class="control">
            <input class="input" type="text" placeholder="http://band.website" name="website" value="{{ $band->website or old('website') }}">
            </p>

            <p class="control">
                <label class="checkbox">
                    <input type="checkbox" name="still_active" {{ ($band->still_active or (old('still_active') == 'on')) ? 'checked' : '' }}>
                    Still Active
                </label>
            </p>

            <p class="control">
                <button class="button is-primary">Save</button>
            </p>
        </form>
@stop
