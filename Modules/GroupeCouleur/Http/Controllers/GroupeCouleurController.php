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
    
    public function create()
    {
        return view('groupecouleur::create');
    }
   
    public function store(Request $request)
    {
        
        GroupeCouleur::create([
            'title' => $request->title,
            'status' => $request->status,
            'group_color' => json_encode($request->group),
            'created_at' => time(),
            ]);
            
            return back()->with('success', trans('groupecouleur::groupecouleur.was_added'));
    }
     
    public function edit($id)
    {
        $colorgroup = GroupeCouleur::findOrFail($id);
        return view('groupecouleur::update', [
                    'couleur'          => $colorgroup,
                ]);
    }

    public function update(Request $request, $id) {
        $content = GroupeCouleur::findOrFail($id);
        $content->update([
            'title' => $request->title,
            'status' => $request->status,
            'group_color' => json_encode($request->group),
            'updated_at' => time(),
        ]);

        return back()->with('success', trans('groupecouleur::groupecouleur.was_updated'));
    }
            
    public function destroy($id)
    {
            $group_color = GroupeCouleur::find($id);
            $group_color->delete();
            return back()->with('success', trans('groupecouleur::groupecouleur.was_deleted'));
    }
        
 }
        