<?php


namespace Core\Services\Contracts;


interface BookServiceContract
{
    public function paginate($numberOfPage);
    public function find($id);
    public function store($data);
    public function update($id,$data);
    public function destroy($id);
}
