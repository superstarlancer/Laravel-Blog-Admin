@inject('view_manager', 'Kontenta\Kontour\Contracts\AdminViewManager')

@extends($view_manager->toolLayout())

@section($view_manager->toolHeaderSection())

@append

@section($view_manager->toolMainSection())
<form action="{{ route('blog-admin.entries.store') }}" method="POST">
@csrf
<input type="hidden" name="blog_id" value="{{ $entry->blog_id }}">
@include('blog-admin::entry.partials.formFields')
<button type="submit">{{ __('Create'))</button>
</form>
@append
