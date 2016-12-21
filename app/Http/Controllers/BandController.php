<?php

namespace App\Http\Controllers;

use App\User;
use App\Band;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBand;

use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Create a Band
     */
    public function create()
    {
        return view('band.create', ['editing' => false]);
    }

    public function edit($id)
    {
        $band = Band::findOrFail($id);
        return view('band.create', ['editing' => true, 'edit_id' => $band->id, 'band' => $band]);
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

    public function save(StoreBand $request)
    {
        if($request->has('edit_id'))
            $band = Band::findOrFail($request->input('edit_id'));
        else
            $band = new Band();

        $band->name = $request->input('name');
        $band->start_date = $request->input('start_date');
        $band->website = $request->input('website');
        $band->still_active = $request->has('still_active');
        $band->save();

        $request->session()->flash('message', 'Saved band: ' . $band->name);
        return redirect()->action("BandController@doList");
    }

    public function doList()
    {
        $bands = Band::all();
        return view('band.list', ['bands' => $bands]);
    }

}
