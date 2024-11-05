<?php

namespace Modules\Pin\app\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\Modules\Pin\Models\Pin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pins = Pin::all();
        // dd($pins);
        return view('pin::index', compact('pins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pin::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3062'
        ]);

        $pin = new Pin;
        $pin->title = $request->title;
        $pin->description = $request->description;
        $pin->image = " ";
        $pin->save();

        if ($request->hasFile('image')) {
            $pin->image = $this->storeImage($pin->id, $request->image);
        }
        $pin->save();
        return redirect()->route('pins.index');
    }

    private function storeImage($imageId, $imageFile)
    {
        $imagePath = 'images/pins';
        $path = public_path($imagePath);
        $imageName = $imageId . '-' . time() . '-' . $imageFile->extension();
        $imageFile->move($path, $imageName);
        return $imagePath . '/' . $imageName;
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $pin = Pin::findOrFail($id);
        return view('pin::show', compact('pin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pin = Pin::findOrFail($id);

        return view('pin::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pin = Pin::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3062'
        ]);

        $pin->title = $request->title;
        $pin->description = $request->description;
        $pin->image = " ";
        $pin->save();
        if ($request->hasFile('image')) {
            $pin->image = $this->storeImage($pin->id, $request->file('image'));
        }
        $pin->save();
        return view('pin::index',)->with('success', 'Pin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dd('hello');
        $pin = Pin::findOrFail($id);
        $pin->delete();
        return redirect()->route('pins.index')->with('success', 'Pin deleted successfully');
    }
}
