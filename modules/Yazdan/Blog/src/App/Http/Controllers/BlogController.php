<?php

namespace Yazdan\Blog\App\Http\Controllers;

use Illuminate\Http\Request;
use Yazdan\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Blog\Repositories\BlogRepository;
use Yazdan\Blog\App\Http\Requests\BlogRequest;
use Yazdan\Category\Repositories\CategoryRepository;

class BlogController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Blog::class);

        $blogs = BlogRepository::getAllPaginate(10);
        return view('Blog::admin.index', compact('blogs'));
    }

    public function create()
    {
        $this->authorize('manage', Blog::class);
        $categories = CategoryRepository::getAll();
        return view('Blog::admin.create',compact('categories'));
    }

    public function store(BlogRequest $request)
    {
        $this->authorize('manage', Blog::class);
        if (isset($request->media)) {
            $images = MediaFileService::publicUpload($request->media);
            $request->request->add(['media_id' => $images->id]);
        }
        BlogRepository::create($request);
        newFeedbacks();
        return redirect()->route('admin.blogs.index');
    }

    public function edit($blogId)
    {
        $this->authorize('manage', Blog::class);

        $blog = BlogRepository::findById($blogId);
        $parentCategories = BlogRepository::getAllExceptById($blogId);
        return view('Blog::admin.edit', compact('blog', 'parentCategories'));
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

    public function postImagesUpload(Request $request)
    {
        $this->authorize('manage', Blog::class);

        $file = $request->file('upload');
        $base_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $file_name = $base_name . '_' . time() . '.' .$ext ;

        $file->storeAs('images/posts',$file_name,'public_files');
        $funcNum = $request->CKEditorFuncNum;
        $fileUrl = asset('images/posts/'.$file_name);
        return response("<script>window.parent.CKEDITOR.tools.callFunction( {$funcNum}, '{$fileUrl}' ,'فایل به درستی آپلود شد' );</script>");
    }

}
