<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Makanan::select('id', 'nama_makanan', 'jum_makanan', 'harga_makanan')
            ->when($search, function ($query, $search) {
                return $query->where('nama_makanan', 'like', "%{$search}%")
                    ->orWhere('harga_makanan', 'like', "%{$search}%");
            })
            ->paginate(50);

        return view('makanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('makanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required|min:3',
            'foto' => 'required|image|mimes:png,jpg,jpeg|between:10,1000',
            'jumlah' => 'required',
            'harga' => 'required'
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $filename = rand(9, 999) . '_' . time() . '.' . $ext;
        $request->foto->move('images/makanan/', $filename);

        Makanan::create([
            'nama_makanan' => $request->nama_makanan,
            'foto_makanan' => $filename,
            'jum_makanan' => $request->jumlah,
            'harga_makanan' => $request->harga
        ]);

        return redirect()->route('makanan.index')->with('status', 'store');
    }
    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('makanan.edit', compact('makanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_makanan' => 'required|min:3',
            'foto_makanan' => 'nullable|image|mimes:png,jpg,jpeg|between:10,1000',
            'jum_makanan' => 'required',
            'harga_makanan' => 'required'
        ]);

        $makanan = Makanan::findOrFail($id);

        if ($request->hasFile('foto_makanan')) {
            // Menghapus foto lama jika ada
            if ($makanan->foto_makanan) {
                $file = public_path('images/makanan/' . $makanan->foto_makanan);
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            // Mengunggah foto baru
            $foto = $request->file('foto_makanan');
            $ext = $foto->getClientOriginalExtension();
            $filename = rand(9, 999) . '_' . time() . '.' . $ext;
            $foto->move(public_path('images/makanan'), $filename);

            $makanan->foto_makanan = $filename;
        }

        $makanan->nama_makanan = $request->input('nama_makanan');
        $makanan->jum_makanan = $request->input('jum_makanan');
        $makanan->harga_makanan = $request->input('harga_makanan');
        $makanan->save();

        return redirect()->route('makanan.index')->with('status', 'update');
    }


    public function destroy(Makanan $makanan)
    {
        if ($makanan->foto_makanan) {
            $file = 'images/makanan/' . $makanan->foto_makanan;

            if (file_exists($file)) {
                unlink($file);
            }
        }

        $makanan->delete();

        return redirect()->back()->with('status', 'destroy');
    }
}
