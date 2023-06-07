<?php

namespace App\Http\Controllers;

use App\Models\ukl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UklController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ujians= ukl::query();

        if ($request->filled('search')) { // jika inputan search ada isinya maka akan dieksekusi
            $ujians->where('name', 'like', '%' . $request->search . '%'); // query pencarian data sesuai nama
        }

        return view('perpus.index', [
            'ujians' => $ujians->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perpus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ukl = new ukl();

        $ukl->name = $request->name;
        $ukl->jurusan = $request->jurusan;
        $ukl->buku = $request->buku;

        $ukl->save();

        return redirect()->route('ujians.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ukl = ukl::find($id);
        return view('perpus.edit', [
            'ukl' => $ukl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ukl = Ukl::find($id);

        $ukl->name = $request->name;
        $ukl->jurusan = $request->jurusan;
        $ukl->buku = $request->buku;

        $ukl->save();

        return redirect()->route('ujians.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ukl = ukl::find($id);
 
        $ukl->delete();

        return redirect()->route('ujians.index');
    }
}
