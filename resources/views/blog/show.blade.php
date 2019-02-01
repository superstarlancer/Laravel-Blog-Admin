@inject('view_manager', 'Kontenta\Kontour\Contracts\AdminViewManager')

@extends($view_manager->toolLayout())

@section('kontourToolHeader')
  <h1>{{ $blog->getTitle() }}</h1>
  <dl lang="en" style="display: grid; grid-auto-flow: column; grid-gap: 1rem;">
    <div>
      <dt>Index</dt>
      <dd><a href="{{ $blog->urlToIndex() }}" target="{{ $blog->getId() }}_blog">{{ $blog->urlToIndex() }}</a></dd>
    </div>
    <div>
      <dt>Feed</dt>
      <dd><a href="{{ $blog->urlToFeed() }}" target="{{ $blog->getId() }}_feed">{{ $blog->urlToFeed() }}</a></dd>
      <dd>{{ $blog->displayFullEntryInFeed() ? 'Full content' : 'Summary or teaser' }} by default</dd>
    </div>
    <div>
      <dt>Updated</dt>
      <dd><time datetime="{{ $blog->getUpdated()->toAtomString() }}">{{ $blog->getUpdated()->diffForHumans() }}</time></dd>
    </div>
  </dl>
  @parent
  @can($blog->getCreateAbility(), $blog->getId())
    <a href="{{ route('blog-admin.entries.create', $blog->getId()) }}">{{ __('Create new blog entry in') }} {{ $blog->getTitle() }}</a>
  @endcan
@endsection

@section('kontourToolMain')
  <table>
  @foreach($entries as $entry)
    <tr>
      <td><a
        @can($blog->getEditAbility(), $entry)
          href="{{ route('blog-admin.entries.edit', [$blog->getId(), $entry->getId()]) }}"
        @elseif($entry->isPublic())
          href="{{ $blog->urlToEntry($entry) }}"
          target="_blank"
        @endif
      >{{ $entry->getTitle() }}</a></td>
      <td lang="en">@include('blog-admin::entry.partials.publishStatusString')</td>
    </tr>
    @endforeach
  </table>
@append
