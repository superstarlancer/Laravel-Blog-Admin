<label for="entry.title">Title</label>
<input id="entry.title" type="text" name="title" value="{{ old('title', $entry->title) }}" required>

<label for="entry.content">Content</label>
<textarea id="entry.content" name="content" required>{{ old('content', $entry->content) }}</textarea>
