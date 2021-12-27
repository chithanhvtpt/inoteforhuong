<?php

namespace App\Repositories;

use App\Models\Note;
use App\Repositories\ipl\NoteRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


;


class NoteRepository extends BaseRepository implements NoteRepositoryInterface
{
    public function __construct(Note $note)
    {
        parent::__construct($note);
    }

    public function create(Request $request)
    {
        $data = $request->only("title", "content", "date", "category_id");
        return Note::query()->create($data);
    }

    public function edit(Request $request, $id)
    {
        Note::findOrFail($id);
        $data = $request->only("title", "content", "date", "category_id");
        return Note::query()->where("id", "=", $id)->update($data);
    }


}
