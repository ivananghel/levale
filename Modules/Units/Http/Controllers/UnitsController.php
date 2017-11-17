<?php

namespace Modules\Units\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Units\Entities\Unit;
use Modules\Units\Http\Requests\UnitsRequest;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['units'] = Unit::all();
        return view('units::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('units::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(UnitsRequest $request)
    {
        Unit::create([
            'title' => $request->title,
            'extension' => $request->extension,
            'status' => $request->status
        ]);

        return back()->with('success', trans('units::units.was_added'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('units::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('units::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UnitsRequest $request, $id)
    {
        $unit = Unit::find($id);
        $unit->update([
            'title' => $request->title,
            'extension' => $request->extension,
            'status' => $request->status
        ]);

        return back()->with('success', trans('units::units.was_updated'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return back()->with('success', trans('units::units.was_deleted'));
    }
}
