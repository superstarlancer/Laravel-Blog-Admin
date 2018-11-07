<?php

namespace Bjuppa\LaravelBlogAdmin\Http\Controllers;

use Bjuppa\LaravelBlog\Eloquent\BlogEntry;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class EntryController extends BaseController
{
    public function create($blog_id)
    {
        $entry = new BlogEntry();
        $entry->blog_id = $blog_id;

        return view('blog-admin::entry.create', compact('entry'));
    }

    public function edit($id)
    {
        $entry = BlogEntry::withUnpublished()->findOrFail($id);

        return view('blog-admin::entry.edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $entry = BlogEntry::withUnpublished()->findOrFail($id);

        $entry->update($request->all());

        return redirect(route('blog-admin.entries.edit', $entry->getKey()));
    }
}
