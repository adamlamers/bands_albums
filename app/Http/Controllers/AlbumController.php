<?php

namespace App\Http\Controllers;

use App\User;
use App\Album;
use App\Band;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbum;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Create an album
     * @return Response
     */
    public function create()
    {
        $bands = Band::all();
        return view('album.create', ['editing' => false, 'bands' => $bands]);
    }

    /**
     * Edit an album
     * @return response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $bands = Band::all();
        return view('album.create', ['editing' => true,
                                     'album' => $album,
                                     'bands' => $bands,
                                     'edit_id' => $id]);
    }

    /**
     * Delete an Album
     * @param $id Id of the band to delete.
     * @return Redirect
     */
    public function delete(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        $request->session()->flash('message', 'Deleted album ' . $album->name);
        return redirect()->action("AlbumController@doList");
    }

    /**
     * Save an Album
     * @return Redirect
     */
    public function save(StoreAlbum $request)
    {
        if($request->has('edit_id'))
            $album = Album::findOrFail($request->input('edit_id'));
        else
            $album = new Album();

        $album->fill($request->all());
        $album->save();

        $request->session()->flash('message', 'Saved album: ' . $album->name);
        return redirect()->action("AlbumController@doList");
    }

    /**
     * List Albums
     * @return Response
     */
    public function doList()
    {
        $albums = Album::all();
        return view('album.list', ['albums' => $albums]);
    }
}
