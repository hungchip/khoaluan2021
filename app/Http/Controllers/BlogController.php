<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::all();
        if ($request) {
            $conditions = [];
            $adminName = $request->adminName;
            $author = $request->author;
            $title = $request->title;
            $blogId = $request->blogId;

            $query = Blog::query();

            if ($author) {
                // $authors = Admin::where('admin_name', 'like', '%'. $author . '%')->get();
                // $query->where('content', 'LIKE', '%' . $author . '%');
                $query->join('hc_admins', 'hc_admins.admin_id', '=', 'hc_blogs.admin_id')->where('admin_name', 'like', '%' . $author . '%');
            }

            if ($title) {
                $query->where('title', 'LIKE', '%' . $title . '%');
            }

            if ($blogId) {
                $query->where('blog_id', 'LIKE', '%' . $blogId . '%');
            }

            $blogs = $query->paginate(8);

            return view('admin.blog.index', compact('blogs', 'admins'));
        } else {
            $blogs = Blog::orderBy('created_at', 'DESC')->paginate(8);
            return view('admin.blog.index', compact('blogs', 'admins'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'quote' => 'required',
            'thumbnail' => 'required',
            'content' => 'required',
        ], []);
        $blog = new Blog();
        $blog->admin_id = $request->adminId;
        $blog->title = $request->title;
        $blog->quote = $request->quote;
        $blog->content = $request->content;
        if ($request->file('thumbnail')) {
            $image = $request->file('thumbnail');
            $getImageName = $image->getClientOriginalName();
            $imageName = current(explode('.', $getImageName));
            $newImage = $imageName . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/image/blog', $newImage);
            $blog->thumbnail = $newImage;
        }
        $blog->save();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm bài viết thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.detail', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'quote' => 'required',
            'content' => 'required',
        ], []);
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->quote = $request->quote;
        if ($request->file('thumbnail')) {
            $path = 'public/image/blog' . $blog->thumbnail;
            File::delete($path);

            $image = $request->file('thumbnail');
            $getImageName = $image->getClientOriginalName();
            $imageName = current(explode('.', $getImageName));
            $newImage = $imageName . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/image/blog', $newImage);
            $blog->thumbnail = $newImage;
        }
        $blog->save();

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật thành công!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $path = 'public/image/blog' . $blog->thumbnail;
        File::delete($path);
        $blog->delete();

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Xóa bài viết thành công!!!']);
    }
}
