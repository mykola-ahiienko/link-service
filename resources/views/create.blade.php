@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Link</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('link.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="original_url">URL:</label>
                <input type="text" name="source_url" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="max_clicks">Max Clicks (0 for unlimited):</label>
                <input type="number" name="max_clicks" class="form-control" required min="0">
            </div>
            <div class="form-group">
                <label for="expires_at">Expiration Date (max value - 24 hours):</label>
                <input type="datetime-local" name="expires_at" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create Link</button>
        </form>
    </div>
@endsection
