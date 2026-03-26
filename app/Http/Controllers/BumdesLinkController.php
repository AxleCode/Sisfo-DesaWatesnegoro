<?php

namespace App\Http\Controllers;

use App\Models\LinkBumdes;
use Illuminate\Http\Request;

class BumdesLinkController extends Controller
{
    public function index()
    {
        $link = LinkBumdes::latest('id')->first();

        $role = auth()->user()?->role;
        $view = in_array($role, ['admin', 'staff'], true)
            ? 'dashboard.bumdes.link'
            : 'bumdes-dashboard.link';

        return view($view, compact('link'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|string|max:1000',
            'is_active' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $link = LinkBumdes::latest('id')->first();
        if ($link) {
            $link->update($validated);
        } else {
            LinkBumdes::create($validated);
        }

        return redirect()->back()->with('success', 'Link Spreadsheet BUMDES berhasil disimpan!');
    }
}

