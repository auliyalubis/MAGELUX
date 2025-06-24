<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranDestinasi;

class SaranDestinasiController extends Controller
{
    public function index()
    {
        $saran = SaranDestinasi::latest()->paginate(5);
        $title = 'Saran Destinasi';

        return view('saran', compact('saran', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        SaranDestinasi::create([
            'nama_tempat' => $request->nama_tempat,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas sarannya!');
    }

    public function destroy($id)
    {
        $saran = SaranDestinasi::findOrFail($id);
        $saran->delete();

        return redirect()->back()->with('success', 'Saran berhasil dihapus!');
    }
}
