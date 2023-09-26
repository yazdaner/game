<?php

namespace Yazdan\Blog\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Blog\App\Http\Requests\BlogRequest;
use Yazdan\Blog\App\Models\Blog;
use Yazdan\Blog\Repositories\BlogRepository;
use Yazdan\Common\Responses\AjaxResponses;

class BlogController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Blog::class);

        $blogs = BlogRepository::getAllPaginate(10);
        return view('Blog::index', compact('blogs'));
    }


    public function store(BlogRequest $request)
    {
        $this->authorize('manage', Blog::class);

        BlogRepository::create($request);
        return back();
    }

    public function edit($blogId)
    {
        $this->authorize('manage', Blog::class);

        $blog = BlogRepository::findById($blogId);
        $parentCategories = BlogRepository::getAllExceptById($blogId);
        return view('Blog::edit', compact('blog', 'parentCategories'));
    }

    public function update($blogId, BlogRequest $request)
    {
        $this->authorize('manage', Blog::class);

        BlogRepository::updating($blogId, $request);
        return redirect(route('admin.blogs.index'));
    }

    public function destroy($blogId)
    {
        $this->authorize('manage', Blog::class);

        BlogRepository::delete($blogId);
        return AjaxResponses::SuccessResponses();
    }
}
