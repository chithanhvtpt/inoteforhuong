<?php
namespace App\Repositories\ipl;
use App\Repositories;
use Illuminate\Http\Request;
interface NoteRepositoryInterface extends BaseRepositoryInterface
{
    public function create(Request $request);

    public function edit(Request $request, $id);
}
