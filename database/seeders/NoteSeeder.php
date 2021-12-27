<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $note = new Note();
        $note->title = "qerqwrwqer";
        $note->content = "ooooooooooooooooooooooooooooooooo";
        $note->date = "2021-10-17";
        $note->category_id = "1";
        $note->save();

        $note = new Note();
        $note->title = "oegpekgoekg";
        $note->content = "zzzzzzzzzzzzzzzzzz";
        $note->date = "2021-10-18";
        $note->category_id = "2";
        $note->save();

        $note = new Note();
        $note->title = "mkfmkrhkrmhr";
        $note->content = "ovdvdgeeeeeeeeeeeeeeeeee";
        $note->date = "2021-10-19";
        $note->category_id = "3";
        $note->save();


    }
}
