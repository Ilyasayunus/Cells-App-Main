<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news.index', [
            'title' => 'Halaman News',
            'data' => News::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create', [
            'title' => 'Halaman Tambah News'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:news',
            'gambar' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        // Handle file upload
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('news-image', 'public');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        $validatedData['created_by'] = auth()->user()->username;

        News::create($validatedData);

        return redirect('/admin/news')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', [
            'title' => 'Detail News',
            'data' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'title' => 'Halaman Edit News',
            'data' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $rules = [
            'judul' => 'required|max:255',
            'gambar' => 'image|file|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $news->slug) {
            $rules['slug'] = 'required|unique:news';
        }

        $validatedData = $request->validate($rules);

        // Handle file upload and delete old file
        if ($request->file('gambar')) {
            if ($request->oldgambar) {
                Storage::delete('public/' . $request->oldgambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('news-image', 'public');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        $validatedData['updated_by'] = auth()->user()->username;

        News::where('id', $news->id)->update($validatedData);

        return redirect('/admin/news')->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Delete associated image
        if ($news->gambar) {
            Storage::delete('public/' . $news->gambar);
        }

        News::destroy($news->id);
        return redirect('/admin/news')->with('success', 'Data Berhasil Dihapus!');
    }

    /**
     * Generate a slug from title.
     */
    public function createSlug(Request $request)
    {
        $slug = Str::slug($request->title);
        return response()->json(['slug' => $slug]);
    }
}
