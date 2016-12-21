<?php

namespace App\Http\Controllers;

use App\User;
use App\Band;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Create a Band
     */
    public function create()
    {
        return view('band.create');
    }

    /**
     * Delete a Band
     * @param $id int ID of the band to delete.
     */
    public function delete(Request $request, $id)
    {
        $band = Band::findOrFail($id);
        $band->albums()->delete();
        $band->delete();

        $request->session()->flash('message', 'Deleted band: ' . $band->name . ' and all associated albums.');
        return redirect()->action("BandController@doList");
    }

    public function save()
    {
        //create or update band
    }

    public function doList()
    {
        $bands = Band::all();
        return view('band.list', ['bands' => $bands]);
    }

}
