<?php

namespace Modules\GroupeCouleur\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\GroupeCouleur\Entities\GroupeCouleur;

class GroupeCouleurController extends Controller
{
   /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['groupecouleurs'] = GroupeCouleur::all();

        return view('groupecouleur::index', $data);
    }

    public function store(Request $request)
    {
    
        GroupeCouleur::create([
            'title' => $request->title,
            'status' => $request->status,
            'group_color' => json_encode($request->group),
            'created_at' => time(),
        ]);

        return back()->with('success', trans('groupecouleur::groupecouleur.task_type_was_added'));
    }
}
