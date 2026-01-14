<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blog = BlogModel::published()->latest()->get();
        $draft = BlogModel::draft()->paginate(10);
        return view('blog.blog', compact('blog', 'draft'));
    }
    public function create()
    {
        return view('blog.blog_create');
    }

    /**
     * Simpan blog baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,publish',
        ]);

        $thumbnail = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('blog', 'public');
        }

        BlogModel::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'thumbnail' => $thumbnail,
            'status' => $request->status,
            'published_at' => $request->status === 'publish' ? now() : null,
        ]);

        return redirect('/blog')->with('swal_success', 'Blog berhasil ditambahkan');
    }

    /**
     * Form edit blog
     */
    public function edit($id)
    {
        $blog = BlogModel::findOrFail($id);
        return view('blog.blog_update', compact('blog'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, $id)
    {
        $blog = BlogModel::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,publish',
        ]);

        $thumbnail = $blog->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && FacadesStorage::disk('public')->exists($blog->thumbnail)) {
                FacadesStorage::disk('public')->delete($blog->thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('blog', 'public');
        }

        $blog->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'thumbnail' => $thumbnail,
            'status' => $request->status,
            'published_at' => $request->status === 'publish' ? now() : null,
        ]);

        return redirect('/blog')->with('swal_success', 'Blog berhasil diperbarui');
    }

    /**
     * Hapus blog
     */
    public function destroy($id)
    {
        $blog = BlogModel::findOrFail($id);
        $blog->delete();

        return back()->with('swal_success', 'Blog berhasil dihapus');
    }
}
