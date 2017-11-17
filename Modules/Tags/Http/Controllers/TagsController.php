<?php

namespace Modules\Tags\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Tags\Services\TagsService;
use Psr\Container\ContainerInterface;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ContainerInterface $container)
    {
        /** @var TagsService $tagService */
        $tagService = $container->get('tags_service');

        return view('tags::index', $tagService->getTags());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('tags::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ContainerInterface $container, Request $request)
    {
        /** @var TagsService $tagService */
        $tagService = $container->get('tags_service');

        $tagService->addTag($request);
        return back()->with('success', trans('tags::tags.was_added'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('tags::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('tags::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ContainerInterface $container, Request $request, $id)
    {
        /** @var TagsService $tagService */
        $tagService = $container->get('tags_service');

        $tagService->updateTag($request, $id);
        return back()->with('success', trans('tags::tags.was_updated'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(ContainerInterface $container, $id)
    {
        /** @var TagsService $tagService */
        $tagService = $container->get('tags_service');
        $tagService->deleteTag($id);
        return back()->with('success', trans('tags::tags.was_deleted'));


    }
}
