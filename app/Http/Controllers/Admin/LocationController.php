<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Location::orderBy('name_tm')
            ->get();

        return view('admin.location.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'delivery_fee' => ['required', 'numeric', 'min:0'],
        ]);

        Location::create([
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en,
            'delivery_fee' => $request->delivery_fee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Location::findOrFail($id);

        return view('admin.location.edit')
            ->with(['obj' => $obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = Location::findOrFail($id);

        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'delivery_fee' => ['required', 'numeric', 'min:0'],
        ]);

        $obj->name_tm = $request->name_tm;
        $obj->name_en = $request->name_en;
        $obj->delivery_fee = $request->delivery_fee;
        $obj->update();

        return to_route('admin.locations.index')
            ->with([
                'success' => trans('app.location') . ' (' . $obj->getName() . ') ' . trans('app.updated')
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Location::findOrFail($id);
        $obj->delete();
        return redirect()->back()
            ->with([
                'success' => trans('app.location') . ' (' . $obj->getName() . ') ' . trans('app.deleted'),
            ]);
    }
}
