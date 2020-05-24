<?php


namespace Core\Services;


use Core\Repositories\Contracts\BookRepositoryContract;
use Core\Services\Contracts\BookServiceContract;
use Illuminate\Support\Facades\Auth;

class BookService implements BookServiceContract
{
    protected $repository;

    public function __construct(BookRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function paginate($numberOfPage)
    {
        return $this->repository->paginate($numberOfPage);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        $data['created_by'] = Auth::id();
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
