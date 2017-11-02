<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tracks');
    }

    public function store(Request $request)

    {
        $this->validate($request, [
            'track_name' => 'required'
        ]);

        $track = Track::where('track_name', $request->track_name)->get();

        if ($track->count()){
            return redirect()->back()->withErrors('Track already exists');
        }

        if ($request->hasFile('img_url')) {
            //
            $image = $request->file('img_url');
            $destinationPath = 'img/track';
            $image->move($destinationPath, $image->getClientOriginalName());
            $image_uri = $destinationPath . '/' . $image->getClientOriginalName();
            if  ($request->hasFile('track_url')) {
                $audio = $request->file('track_url');
                $destinationPath = 'media/track';
                $audio->move($destinationPath, $audio->getClientOriginalName());
                $audio_uri = $destinationPath . '/' . $audio->getClientOriginalName();

                $track = new Track;
                $track->artist_id = $request->input('artist_id');
                $track->track_name = $request->input('track_name');
                $track->track_url = $audio_uri;
                $track->vod = $request->input('vod');
                $track->orang = $request->input('orang');
                $track->etis = $request->input('etis');
                $track->album_id = $request->input('album_id');
                $track->img_url = $image_uri;
                if ($request->hasFile('ringtone_url')){
                    $ringtone = $request->file('ringtone_url');
                    $destinationPath = 'media/ringtone';
                    $ringtone->move($destinationPath, $ringtone->getClientOriginalName());
                    $ringtone_uri = $destinationPath . '/' . $ringtone->getClientOriginalName();

                    $track->ringtone_url = $ringtone_uri;
                } else {
                    return redirect()->back()->withErrors('Something wrong with ringtone');
                }
                $artist = Artist::find($request->input('artist_id'));
                $track->artist_name = $artist->artist_name;

                $track->save();


                session()->flash('message', 'Track has been added successfully.');
                return redirect()->back();
            } else {
                return redirect()->back()->withErrors('Something wrong with track');
            }

        } else {
            return redirect()->back()->withErrors('Something wrong with image');
        }
    }

    public function trackList()
    {
        $tracks = Track::orderBy('id', 'desc')->paginate(20);
        return view('trackList', compact('tracks'));
    }

    public function search(Request $request)
    {
        $category = $request->category;
        $search = $request->search;
        switch ($category){
            case 0:
                $tracks = Track::where('artist_name', 'like', "%$search%")->get();
                return view('TrackSearchList', compact('tracks'));
            case 1:
                $album = Album::where('album_name', 'like', "%$search%")->first();
                if (count($album) > 0){
                    $tracks = Track::where('album_id', $album->album_id)->get();
                } else {
                    $tracks = null;
                }
                return view('trackSearchList', compact('tracks'));
            case 2:
                $tracks = Track::where('track_name', 'like', "%$search%")->get();

                return view('trackSearchList', compact('tracks'));
            default:
                return false;
        }
    }

    public function newTrack()
    {
        $artists = Artist::all();
        $albums = Album::all();

        return view('track', compact(['artists','albums']));
    }

    public function delete($id)
    {
        $track = Track::find($id);

        $track->delete();

        return redirect()->route('tracks');
    }

    public function editTrack($id)
    {
        $track = Track::find($id);
        $albums = Album::all();
        $artists = Artist::all();
        return view('editTrack', compact(['track', 'albums', 'artists']));
    }

    public function update(Request $request)
    {

        $track = Track::find($request->id);
        $track->track_name = $request->track_name;
        $track->vod = $request->vod;
        $track->orang = $request->orang;
        $track->etis = $request->etis;
        if ($request->hasFile('img_url')){
            $file = $request->file('img_url');
            $destinationPath = 'img/track';
            $file->move($destinationPath, $file->getClientOriginalName());
            $uri = $destinationPath . '/' . $file->getClientOriginalName();

            $track->img_url = $uri;
        }
        if ($request->hasFile('track_url')){
            $audio = $request->file('track_url');
            $destinationPath = 'media/track';
            $audio->move($destinationPath, $audio->getClientOriginalName());
            $audio_uri = $destinationPath . '/' . $audio->getClientOriginalName();

            $track->track_url = $audio_uri;
        }
        if ($request->hasFile('ringtone_url')){
            $ringtone = $request->file('ringtone_url');
            $destinationPath = 'media/ringtone';
            $ringtone->move($destinationPath, $ringtone->getClientOriginalName());
            $ringtone_uri = $destinationPath . '/' . $ringtone->getClientOriginalName();

            $track->ringtone_url = $ringtone_uri;
        }
        $artist = Artist::find($request->artist_id);
        $track->artist_name = $artist->artist_name;
        $track->artist_id = $request->artist_id;
        $track->save();

        session()->flash('message', 'Track has been updated');
        return view('editTrack', compact('Track'));
    }
}
