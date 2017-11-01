<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('artists');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'artist_name' => 'required'
        ]);
        $artist = Artist::where('artist_name', $request->artist_name)->get();

        if ($artist->count()){
            return redirect()->back()->withErrors('Artist already exists');
        }

        if ($request->hasFile('img_url')) {
            //
            $file = $request->file('img_url');
            $destinationPath = 'img/artist';
            $file->move($destinationPath, $file->getClientOriginalName());
            $uri = $destinationPath . '/' . $file->getClientOriginalName();

            $artist = new Artist;
            $artist->artist_name = $request->input('artist_name');
            $artist->img_url     = $uri;

            $artist->save();

            session()->flash('message', 'Artist has been added successfully.');
            return redirect()->back();
        }
    }

    public function artistList()
    {
        $artists = Artist::paginate(20);
        return view('artistList', compact('artists'));
    }

    public function search(Request $request)
    {
        $artists = Artist::where('artist_name', 'like', '%'.$request->search.'%')->get();

        return view('artistList', compact('artists'));
    }

    public function newArtist()
    {
        return view('artist');
    }

    public function delete($id)
    {
        $artist = Artist::find($id);

        foreach($artist->tracks as $track){
            $track->delete();
        }

        foreach($artist->albums as $album){
            $album->delete();
        }

        $artist->delete();

        return redirect()->route('artists');
    }

    public function editArtist($id)
    {
        $artist = Artist::find($id);

        return view('editArtist', compact('artist'));
    }

    public function update(Request $request)
    {

        $artist = Artist::find($request->id);
        $artist->artist_name = $request->artist_name;
        if ($request->hasFile('img_url')){
            $file = $request->file('img_url');
            $destinationPath = 'img/artist';
            $file->move($destinationPath, $file->getClientOriginalName());
            $uri = $destinationPath . '/' . $file->getClientOriginalName();

            $artist->img_url = $uri;
        }
        $artist->save();

        session()->flash('message', 'Artist has been updated');
        return view(route('editArtist', compact('artist')));
    }

    public function artistAlbums(Request $request)
    {

        $artist = Artist::find($request->id);
        $albums = $artist->albums;
        return view('artistAlbumsList', compact('albums'));
    }
}

