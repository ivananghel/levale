<?php

/**
 * Created by PhpStorm.
 * User: bunescuion
 * Date: 11/15/17
 * Time: 17:46
 */
namespace Modules\Tags\Services;

use Modules\Tags\Entities\Tag;

class TagsService
{

    const TAGS_SERVICE_ALIAS = 'tags_service';


    public function getTags()
    {
        $data['tags'] = Tag::all();
        return $data;
    }

    public function addTag($request)
    {
        $tag = Tag::create([
            'title' => $request->title,
            'color' => $request->color,
        ]);
        return $tag->id;
    }

    public function updateTag($request, $id)
    {
        $tag = Tag::find($id);
        $tag->update([
            'title' => $request->title,
            'color' => $request->color,
        ]);

        return $tag->id;
    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
    }

}