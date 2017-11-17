<?php

namespace Modules\TaskType\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TaskType\Entities\TaskType;
use Modules\TaskType\Http\Requests\TaskTypeRequest;

class TaskTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['tasks'] = TaskType::all();
        return view('tasktype::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('tasktype::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(TaskTypeRequest $request)
    {
        TaskType::create([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return back()->with('success', trans('units::units.task_type_was_added'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('tasktype::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('tasktype::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(TaskTypeRequest $request, $id)
    {
        $unit = TaskType::find($id);
        $unit->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return back()->with('success', trans('units::units.task_type_was_updated'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $unit = TaskType::find($id);
        $unit->delete();
        return back()->with('success', trans('units::units.task_type_was_deleted'));
    }
}
