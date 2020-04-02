<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Models\SongsModel;

class SongsController
{
    /**
     * @return array
     */
    public function index()
    {
        return SongsModel::all();
    }

    /**
     * @param  SongRequest $request
     * @return integer $id
     */
    public function create(SongRequest $request)
    {
        $id = SongsModel::create($request->validated());
        return $id;
    }

    /**
     * @param  SongsModel $song
     * @return integer $id
     */
    public function show(SongsModel $song)
    {
        return $song = SongsModel::findOrFail($song->id);
    }

    /**
     * @param  SongRequest  $request
     * @param  string  $next
     * @return mixed
     */
    public function update(SongRequest $request, $title)
    {
        $song = SongsModel::findOrFail($title);
        $song->save();
        return response()->json($song);
    }

    /**
     * @param  SongRequest  $request
     * @param  string  $next
     * @return mixed
     */
    public function delete(SongRequest $request, $title)
    {
        $song = SongsModel::findOrFail($title);
        if ($song->delete()){
            return response(null, 204);
        }
    }
}
