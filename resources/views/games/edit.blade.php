@extends('layouts.app')

@section('content')
<div class="gs-container">

    <div class="gs-page-header">
        <h1 class="gs-page-title">Edit <span>{{ $game->title }}</span></h1>
        <a href="{{ route('games.show', $game) }}" class="gs-btn gs-btn-ghost">← Back</a>
    </div>

    <div class="gs-form-wrap">

        @if($errors->any())
            <div class="gs-errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('games.update', $game) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="gs-form-group">
                <label class="gs-label">Game Title *</label>
                <input type="text" name="title" class="gs-input" value="{{ old('title', $game->title) }}" required>
            </div>

            <div class="gs-form-group">
                <label class="gs-label">Description</label>
                <textarea name="description" class="gs-textarea">{{ old('description', $game->description) }}</textarea>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="gs-form-group">
                    <label class="gs-label">Genre</label>
                    <input type="text" name="genre" class="gs-input" value="{{ old('genre', $game->genre) }}" placeholder="e.g. RPG, FPS...">
                </div>
                <div class="gs-form-group">
                    <label class="gs-label">Platform</label>
                    <input type="text" name="platform" class="gs-input" value="{{ old('platform', $game->platform) }}" placeholder="e.g. PC, PS5...">
                </div>
            </div>

            <div class="gs-form-group">
                <label class="gs-label">Release Year</label>
                <input type="number" name="release_year" class="gs-input" value="{{ old('release_year', $game->release_year) }}" min="1970" max="{{ date('Y') + 2 }}">
            </div>

            <div class="gs-form-group">
                <label class="gs-label">Cover Image</label>
                @if($game->cover_image)
                    <img src="{{ Storage::url($game->cover_image) }}" style="width:100%;max-height:150px;object-fit:cover;margin-bottom:0.75rem;border:1px solid var(--border-glow);" alt="Current cover">
                    <p style="font-family:var(--font-mono);font-size:0.75rem;color:var(--text-muted);margin-bottom:0.5rem;">Upload new image to replace current</p>
                @endif
                <input type="file" name="cover_image" class="gs-file-input" accept="image/*">
            </div>

            <button type="submit" class="gs-btn gs-btn-primary" style="width:100%;justify-content:center;padding:0.85rem;">
                Save Changes
            </button>

        </form>
    </div>

</div>
@endsection