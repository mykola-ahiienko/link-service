@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Links</h1>
        <a href="{{ route('link.create') }}" class="btn btn-success mb-3">Create New Link</a>
        @if ($links->isEmpty())
            <div class="alert alert-info">No links have been created yet.</div>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Source URL</th>
                    <th>Clicks</th>
                    <th>Max Clicks</th>
                    <th>Expires At</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($links as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->source_url }}</td>
                        <td>{{ $link->clicks }}</td>
                        <td>{{ $link->max_clicks }}</td>
                        <td>{{ $link->expires_at }}</td>
                        <td>{{ $link->created_at }}</td>
                        <td>{{ $link->updated_at }}</td>
                        <td>
                            <a href="{{ route('link.edit', ['link' => $link->id]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('link.delete', ['link' => $link->id]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
