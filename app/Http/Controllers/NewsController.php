<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita di admin
     */
    public function index(Request $request)
    {
        $query = News::with(['category', 'user'])->latest();

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by year
        if ($request->has('year') && $request->year != 'all') {
            $query->whereYear('created_at', $request->year);
        }

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('is_published', $request->status == 'published');
        }

        $news = $query->paginate(10);
        $categories = Category::where('is_active', true)->get();
        $years = News::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('dashboard.berita', compact('news', 'categories', 'years'));
    }

    /**
     * Menampilkan form tambah berita
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('dashboard.berita-create', compact('categories'));
    }

    /**
     * Menyimpan berita baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        // Upload featured image
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('news', 'public');
            $validated['featured_image'] = $imagePath;
        }

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']);

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        News::create($validated);

        // Clear cache
        Cache::forget('latest_news');
        Cache::forget('featured_news');

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail berita di frontend
     */
    public function show($slug)
    {
        $news = News::with(['category', 'user'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Increment views
        $news->incrementViews();

        // Get related news
        $relatedNews = News::where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        // Get latest news for slider
        $latestNews = News::with('category')
            ->where('is_published', true)
            ->where('id', '!=', $news->id)
            ->latest()
            ->take(8)
            ->get();

        return view('news.show', compact('news', 'relatedNews', 'latestNews'));
    }

    /**
     * Menampilkan form edit berita
     */
    public function edit(News $news)
    {
        $categories = Category::where('is_active', true)->get();
        return view('dashboard.berita-edit', compact('news', 'categories'));
    }

    /**
     * Mengupdate berita
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        // Upload new featured image if provided
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($news->featured_image && Storage::disk('public')->exists($news->featured_image)) {
                Storage::disk('public')->delete($news->featured_image);
            }
            
            $imagePath = $request->file('featured_image')->store('news', 'public');
            $validated['featured_image'] = $imagePath;
        }

        $validated['slug'] = Str::slug($validated['title']);

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $news->update($validated);

        // Clear cache
        Cache::forget('latest_news');
        Cache::forget('featured_news');

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Menghapus berita
     */
    public function destroy(News $news)
    {
        // Delete featured image
        if ($news->featured_image && Storage::disk('public')->exists($news->featured_image)) {
            Storage::disk('public')->delete($news->featured_image);
        }

        $news->delete();

        // Clear cache
        Cache::forget('latest_news');
        Cache::forget('featured_news');

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Menampilkan semua berita di frontend
     */
    public function list(Request $request)
    {
        $query = News::with('category')
            ->where('is_published', true)
            ->latest();

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by year
        if ($request->has('year') && $request->year != 'all') {
            $query->whereYear('created_at', $request->year);
        }

        $news = $query->paginate(9);
        $categories = Category::where('is_active', true)->get();
        $years = News::selectRaw('YEAR(created_at) as year')
            ->where('is_published', true)
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('news.index', compact('news', 'categories', 'years'));
    }
}