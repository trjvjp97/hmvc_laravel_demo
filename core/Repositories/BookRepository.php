<?php


namespace Core\Repositories;

use Core\Repositories\Contracts\BookRepositoryContract;
use Core\Modules\Book\Models\Book;


class BookRepository implements BookRepositoryContract
{

    protected $model;
    protected $user;
    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function paginate($numOfPage)
    {
        $arr = $this->model->with("user:id,name");
        return $arr->paginate($numOfPage);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $book = $this->find($id);
        return $book->update($data);
    }

    public function destroy($id)
    {
        $book = $this->find($id);
        return $book->destroy($id);
    }
}
