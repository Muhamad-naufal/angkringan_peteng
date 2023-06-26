<?php

namespace App\Http\Controllers;

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

        return view('makanan.index', ['data' => $data]);
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
            'foto' => 'required|image|mimes:png,jpg,jpeg|between:40,1000',
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama_makanan' => 'required|min:3',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|dimensions:min_width=1000,min_height=500|between:40,1000',
            'jumlah' => 'required',
            'harga' => 'required'
        ]);

        if ($makanan->foto_makanan && $request->foto) {
            $file = 'assets/makanan/' . $makanan->foto_makanan;

            if (file_exists($file)) {
                unlink($file);
            }
        }

        if ($request->foto) {
            $ext = $request->foto->getClientOriginalExtension();
            $filename = rand(9, 999) . '_' . time() . '.' . $ext;
            $request->foto->move('images/makanan/', $filename);

            $arr = [
                'nama_makanan' => $request->nama_makanan,
                'foto_makanan' => $filename,
                'jum_makanan' => $request->jumlah,
                'harga_makanan' => $request->harga
            ];
        } else {
            $arr = [
                'nama_makanan' => $request->nama_makanan,
                'jum_makanan' => $request->jumlah,
                'harga_makanan' => $request->harga
            ];
        }

        $makanan->update($arr);

        return redirect()->route('makanan.index')->with('status', 'update');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Makanan $makanan)
    {
        return view('makanan.edit', ['row' => $makanan]);
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Makanan $makanan)
    {
        if ($makanan->foto_makanan) {
            $file = 'assets/makanan/' . $makanan->foto_makanan;

            if (file_exists($file)) {
                unlink($file);
            }
        }

        $makanan->delete();

        return back()->with('status', 'destroy');
    }
}
