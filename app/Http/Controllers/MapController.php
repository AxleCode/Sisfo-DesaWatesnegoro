<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;
use App\Models\MapPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    /**
     * Menampilkan halaman management peta
     */
    public function index()
    {
        $maps = Map::with('photos')->orderBy('order')->get();
        return view('dashboard.peta', compact('maps'));
    }

    /**
     * Menyimpan data peta baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'address' => 'nullable|string|max:500',
            'type' => 'required|in:general,important,facility',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:50',
            'link_map' => 'nullable|string|max:500',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'captions.*' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $map = Map::create($validator->validated());

        // Upload photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $photo) {
                if ($photo) {
                    $path = $photo->store('map-photos', 'public');
                    
                    MapPhoto::create([
                        'map_id' => $map->id,
                        'photo_path' => $path,
                        'caption' => $request->captions[$index] ?? null,
                        'order' => $index
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data peta berhasil ditambahkan!',
            'data' => $map->load('photos')
        ]);
    }

    /**
     * Menampilkan data peta untuk edit
     */
    public function show(Map $map)
    {
        return response()->json([
            'success' => true,
            'data' => $map->load('photos')
        ]);
    }

    /**
     * Mengupdate data peta
     */
    public function update(Request $request, Map $map)
    {
        // Jika data dikirim dengan prefix 'peta'
        $requestData = $request->has('peta') ? $request->peta : $request->all();
        
        $validator = Validator::make($requestData, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'address' => 'nullable|string|max:500',
            'link_map' => 'nullable|string|max:500',
            'type' => 'required|in:general,important,facility',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
    
        $validatedData = $validator->validated();
        $validatedData['is_active'] = isset($requestData['is_active']) && $requestData['is_active'] == '1';
    
        // Update data
        $map->update($validatedData);
    
        // Handle photos separately
        if ($request->has('delete_photos')) {
            foreach ($request->delete_photos as $photoId) {
                $photo = MapPhoto::find($photoId);
                if ($photo) {
                    Storage::disk('public')->delete($photo->photo_path);
                    $photo->delete();
                }
            }
        }
    
        if ($request->hasFile('photos')) {
            $existingPhotosCount = $map->photos()->count();
            
            foreach ($request->file('photos') as $index => $photo) {
                if ($photo && $photo->getSize() > 0) { // Pastikan file tidak kosong
                    $path = $photo->store('map-photos', 'public');
                    
                    MapPhoto::create([
                        'map_id' => $map->id,
                        'photo_path' => $path,
                        'caption' => $request->captions[$index] ?? null,
                        'order' => $existingPhotosCount + $index
                    ]);
                }
            }
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Data peta berhasil diperbarui!',
            'data' => $map->load('photos')
        ]);
    }

    /**
     * Menghapus data peta
     */
    public function destroy(Map $map)
    {
        // Delete all photos
        foreach ($map->photos as $photo) {
            Storage::disk('public')->delete($photo->photo_path);
            $photo->delete();
        }

        $map->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data peta berhasil dihapus!'
        ]);
    }

    /**
     * Mendapatkan data peta untuk frontend
     */
    public function getMapData()
    {
        $maps = Map::with('photos')
            ->where('is_active', true)
            ->get()
            ->map(function ($map) {
                // Tambahkan properti google_maps_url secara manual
                return [
                    'id' => $map->id,
                    'title' => $map->title,
                    'description' => $map->description,
                    'latitude' => $map->latitude,
                    'longitude' => $map->longitude,
                    'address' => $map->address,
                    'type' => $map->type,
                    'color' => $map->color,
                    'icon' => $map->icon,
                    'is_active' => $map->is_active,
                    'link_map' => $map->link_map,
                    'google_maps_url' => $map->google_maps_url, // Pastikan ini ada
                    'photos' => $map->photos,
                    'created_at' => $map->created_at,
                    'updated_at' => $map->updated_at
                ];
            });
        
        return response()->json([
            'success' => true,
            'data' => $maps
        ]);
    }
}