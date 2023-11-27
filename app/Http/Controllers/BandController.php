<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class BandController extends Controller
{
    public function addBand(){
        $bands=$this->getAllBands();
        return view('band.addBand');
    }

    public function createBand(Request $request){
        $request->validate([
            'name'=>'required|string|max:50',
            'photo'=>'required|image',
        ]);
        if($request->hasFile('photo')){
            $photo=Storage::putFile('bandPhotos',$request->photo);
        }

        DB::table('music_bands')->insert([
            'name'=>$request->name,
            'photo'=>$photo,
        ]);
        return redirect()->route('allBands')->with('message','Banda adicionada com successo!');
    }

    public function deleteBand($id){
        DB::table('music_bands')->where('id',$id)->delete();

        return redirect()->route('allBands')->with('alert','Contacto apagado com successo!');
    }

    public function allBands(){

        $bandsWithCounts=$this->bandsWithAlbumCounts();

        return view('band.allBands',compact('bandsWithCounts'));
    }

    public function viewBand($id){
        $band=DB::table('music_bands')->where('id',$id)->first();

        $albums=DB::table('albums')->where('music_band_id',$id)->get();

        return view('band.viewBand',compact('band','albums'));
    }

    public function viewAlbum($id){
        $album=DB::table('albums')->where('id',$id)->first();
        return view('band.viewAlbum',compact('album'));
    }

    public function addAlbum($id){
        $band=DB::table('music_bands')->where('id',$id)->first();

        return view('band.addAlbum', compact('band'));
    }

    public function createAlbum(Request $request){
        $request->validate([
            'title'=>'required|string|max:50',
            'photo'=>'required|image',
            'music_band_id'=>'required',
            'year'=>'required|numeric',
        ]);
        if($request->hasFile('photo')){
            $photo=Storage::putFile('bandPhotos',$request->photo);
        }

        DB::table('albums')->insert([
            'title'=>$request->title,
            'photo'=>$photo,
            'music_band_id'=>$request->music_band_id,
            'year'=>$request->year
        ]);
        return redirect()->route('viewBand',$request->music_band_id)->with('message','Album adicionado com successo!');
    }

    public function deleteAlbum($id){

        DB::table('albums')->where('id',$id)->delete();

        return redirect()->back()->with('alert','Contacto apagado com successo!');
    }

    protected function getAllBands(){
        $bands=DB::table('music_bands')
        ->get();
        return $bands;
    }

    protected function bandsWithAlbumCounts(){
        $bandsWithCounts = DB::table('music_bands')
        ->select('music_bands.id', 'music_bands.name', DB::raw('COUNT(albums.id) as albums_count'),"music_bands.photo")
        ->leftJoin('albums', 'music_bands.id', '=', 'albums.music_band_id')
        ->groupBy('music_bands.id', 'music_bands.name')
        ->get();

        return $bandsWithCounts;
    }
}

