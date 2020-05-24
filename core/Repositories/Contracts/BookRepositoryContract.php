<?php


namespace Core\Repositories\Contracts;


interface BookRepositoryContract
{
    public function paginate($numOfPage);
    public function find($id);
    public function store($data);
    public function update($id,$data);
    public function destroy($id);
}
