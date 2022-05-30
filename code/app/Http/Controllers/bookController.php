<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use File;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $buku = buku::where('judul', 'LIKE', '%' . $request->cari . '%')
            ->orWhere('penulis', 'LIKE', '%' . $request->cari . '%')->
            orWhere('penerbit', 'LIKE', '%' . $request->cari . '%')->
            orWhere('tahun_terbit', 'LIKE', '%' . $request->cari . '%')->paginate(2);
        } else {
            $buku = buku::latest()->paginate(2);
        }
        return view('buku.index', compact('buku'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'cover' => 'required|image|mimes:jpeg,jpg,png|max:10000'
        ]);

        $input = $request->all();

        if ($image = $request->file('cover')) {
            $destination = 'image/';
            $imagename = date('YmdHis') . "-" . $image->getClientOriginalName();
            $image->move($destination, $imagename);
            $input['cover'] = "$imagename";
        } 

        buku::create($input);

        return redirect()->route('buku.index')->with('success', 'buku berhasil di tambahkan');
        // else {
        //     unset($input['image']);
        // }

        // return redirect()->route('buku.index')->with('success', 'buku berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'cover' => 'image|mimes:jpeg,jpg,png|max:10000'
        ]);

        $input = $request->all();

        if ($image = $request->file('cover')) {
            if ($request->oldCover) {
                File::delete('image/'.$request->oldCover);
            };
            $destination = 'image/';
            $imagename = date('YmdHis') . "-" . $image->getClientOriginalName();
            $image->move($destination, $imagename);
            $input['cover'] = "$imagename";
        } else {
            unset($input['cover']);
        }

        $buku->update($input);

        return redirect()->route('buku.index')->with('success', 'buku berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(buku $buku)
    {
        if(File::exists(public_path('image/' . $buku->cover))){
            File::delete('image/'.$buku->cover);
        };
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'buku berhasil di hapus');
    }

    public function delete($id)
    {
        $buku = buku::find($id);
        if(File::exists(public_path('image/' . $buku->cover))){
            File::delete('image/'.$buku->cover);
        };
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'buku berhasil di hapus');
    }
}