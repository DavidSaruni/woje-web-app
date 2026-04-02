<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function index()
    {
        $posters = Poster::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posters.index', compact('posters'));
    }

    public function create()
    {
        return view('admin.posters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posters'), $imageName);
            $validated['image_path'] = 'images/posters/' . $imageName;
        }

        // Deactivate all other posters since we only want one active
        Poster::where('is_active', true)->update(['is_active' => false]);

        // Create new poster with active status
        $validated['is_active'] = $request->boolean('is_active', true);
        Poster::create($validated);

        return redirect()->route('admin.posters.index')
            ->with('success', 'Poster created successfully.');
    }

    public function edit(Poster $poster)
    {
        return view('admin.posters.edit', compact('poster'));
    }

    public function update(Request $request, Poster $poster)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', $poster->is_active),
        ];

        // Handle image upload if new image provided
        if ($request->hasFile('image_path')) {
            // Delete old image
            if ($poster->image_path && file_exists(public_path($poster->image_path))) {
                unlink(public_path($poster->image_path));
            }

            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posters'), $imageName);
            $data['image_path'] = 'images/posters/' . $imageName;
        }

        // Deactivate all other posters if this one is being activated
        if ($request->boolean('is_active', $poster->is_active)) {
            Poster::where('id', '!=', $poster->id)->where('is_active', true)->update(['is_active' => false]);
        }

        $poster->update($data);

        return redirect()->route('admin.posters.index')
            ->with('success', 'Poster updated successfully.');
    }

    public function destroy(Poster $poster)
    {
        // Delete image file
        if ($poster->image_path && file_exists(public_path($poster->image_path))) {
            unlink(public_path($poster->image_path));
        }

        $poster->delete();

        return redirect()->route('admin.posters.index')
            ->with('success', 'Poster deleted successfully.');
    }
}
