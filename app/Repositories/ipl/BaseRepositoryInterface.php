<?php
namespace App\Repositories\ipl;
interface BaseRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function delete($id);

}
