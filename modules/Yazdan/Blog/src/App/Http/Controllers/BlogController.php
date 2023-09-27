<?php

namespace Yazdan\Blog\App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yazdan\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
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
        return view('Blog::admin.create', compact('categories'));
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
        return redirect(route('admin.blogs.index'));
    }

    public function edit($id)
    {
        $this->authorize('manage', Blog::class);

        $blog = BlogRepository::findById($id);
        $categories = CategoryRepository::getAll();
        return view('Blog::admin.edit', compact('blog', 'categories'));
    }

    public function update($id, BlogRequest $request)
    {
        $this->authorize('manage', Blog::class);
        $blog = BlogRepository::findById($id);
        if ($request->hasFile('media')) {
            if ($blog->media) {
                $blog->media->delete();
            }
            $images = MediaFileService::publicUpload($request->media);
            $request->request->add(['media_id' => $images->id]);
        } else {
            if ($blog->media) {
                $request->request->add(['media_id' => $blog->media->id]);
            }
        }
        BlogRepository::updating($id, $request);
        newFeedbacks();
        return redirect(route('admin.blogs.index'));
    }

    public function destroy($id)
    {
        $this->authorize('manage', Blog::class);

        BlogRepository::delete($id);
        return AjaxResponses::SuccessResponses();
    }

    public function postImagesUpload(Request $request)
    {
        $this->authorize('manage', Blog::class);

        $file = $request->file('upload');
        $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $file_name = $base_name . '_' . time() . '.' . $ext;

        $file->storeAs('images/posts', $file_name, 'public_files');
        $funcNum = $request->CKEditorFuncNum;
        $fileUrl = asset('images/posts/' . $file_name);
        return response("<script>window.parent.CKEDITOR.tools.callFunction( {$funcNum}, '{$fileUrl}' ,'فایل به درستی آپلود شد' );</script>");
    }



    public function blogs()
    {
        $blogs = Blog::latest()->paginate(2);
        return view('Blog::front.index',compact('blogs'));
    }

    public function blogShow(Blog $blog, Request $request)
    {
        // $comments = $blog->comments()->where('comment_id', null)->where('is_approved', true)->latest()->paginate(20);
        if (!auth()->check()) { //guest user identified by ip
            $cookie_name = (Str::replace('.', '', ($request->ip())) . '-' . $blog->id . '-' . 'blog');
        } else {
            $cookie_name = (auth()->id() . '-' . $blog->id . '-' . 'blog'); //logged in user
        }
        if (Cookie::get($cookie_name) == '') { //check if cookie is set
            $cookie = cookie($cookie_name, '1', 60); //set the cookie
            $blog->incrementReadCount(); //count the view
            return response()
                // ->view('home.blogs.show', compact('blog', 'comments'))
                ->view('Blog::front.show', compact('blog'))
                ->withCookie($cookie); //store the cookie
        } else {
            // return view('home.blogs.show', compact('blog', 'comments')); //this view is not counted
            return view('Blog::front.show', compact('blog')); //this view is not counted
        }
    }
}
