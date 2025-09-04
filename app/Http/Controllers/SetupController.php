<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SetupController extends Controller
{
    /**
     * Menampilkan halaman setup website
     */
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('dashboard.setup', compact('settings'));
    }

    /**
     * Menyimpan pengaturan website
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'site_keywords' => 'nullable|string',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'working_hours' => 'required|string',
            'footer_text' => 'required|string',
            'copyright' => 'required|string',
            'google_analytics' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:ico,png|max:1024',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update basic settings
        $this->updateSetting('site_name', $validated['site_name']);
        $this->updateSetting('site_description', $validated['site_description']);
        $this->updateSetting('site_keywords', $validated['site_keywords']);
        $this->updateSetting('address', $validated['address']);
        $this->updateSetting('phone', $validated['phone']);
        $this->updateSetting('email', $validated['email']);
        $this->updateSetting('working_hours', $validated['working_hours']);
        $this->updateSetting('footer_text', $validated['footer_text']);
        $this->updateSetting('copyright', $validated['copyright']);
        $this->updateSetting('google_analytics', $validated['google_analytics']);
        $this->updateSetting('meta_tags', $validated['meta_tags']);

        // Update social media
        $socialMedia = [
            'facebook' => $validated['facebook'] ?? '#',
            'twitter' => $validated['twitter'] ?? '#',
            'instagram' => $validated['instagram'] ?? '#',
            'youtube' => $validated['youtube'] ?? '#',
        ];
        Setting::setSocialMedia($socialMedia);

        // Handle file uploads
        $this->handleFileUpload($request, 'site_logo');
        $this->handleFileUpload($request, 'site_favicon');
        $this->handleFileUpload($request, 'footer_logo');

        // Clear all caches
        Cache::flush();

        return redirect()->back()->with('success', 'Pengaturan website berhasil disimpan!');
    }

    /**
     * Update individual setting
     */
    private function updateSetting($key, $value)
    {
        if ($value !== null) {
            Setting::setValue($key, $value);
        }
    }

    /**
     * Handle file upload
     */
    private function handleFileUpload(Request $request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $path = $file->store('settings', 'public');
            
            // Delete old file if exists
            $oldFile = Setting::getValue($fieldName);
            if ($oldFile && Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }
            
            Setting::setValue($fieldName, $path);
        }
    }
}