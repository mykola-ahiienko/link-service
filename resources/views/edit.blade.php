@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Link</h1>
        <form action="{{ route('link.update', ['link' => $link->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="original_url">URL:</label>
                <input type="text" name="source_url" class="form-control" value="{{ $link->source_url }}" required>
            </div>
            <div class="form-group">
                <label for="max_clicks">Max Clicks (0 for unlimited):</label>
                <input type="number" name="max_clicks" class="form-control" value="{{ $link->max_clicks }}" required min="0">
            </div>
            <div class="form-group">
                <label for="expires_at">Expiration Date (max value - 24 hours):</label>
                <input type="datetime-local" name="expires_at" class="form-control" value="{{ $link->expires_at ? Carbon\Carbon::parse($link->expires_att)->format('Y-m-d') : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Link</button>
        </form>
    </div>
@endsection




