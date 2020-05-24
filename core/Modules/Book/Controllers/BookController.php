<?php


namespace Core\Modules\Book\Controllers;


use App\Http\Controllers\Controller;
use Core\Modules\Book\Requests\CreateBookRequest;
use Core\Modules\Book\Requests\EditBookRequest;
use Core\Services\Contracts\BookServiceContract;

class BookController extends Controller
{
    protected $service;

    public function __construct(BookServiceContract $service)
    {
        $this->service = $service;
    }

    public function index(){
        $items = $this->service->paginate(2);
        return view('Book::books.index',compact('items'));
    }
    public function find($id){
        $item =$this->service->find($id);
        return view('Book::books.edit',compact('item'));
    }

    public function update(EditBookRequest $request,$id){
        $this->service->update($id,$request->all());
        return redirect()->route('Book.books.index');
    }

    public function create(){
        return view('Book::books.create');
    }

    public function store(CreateBookRequest $request){

        $this->service->store($request->all());
        return redirect()->route('Book.books.index');
    }

    public function destroy($id){
        $this->service->destroy($id);
        return redirect()->route('Book.books.index');
    }

}
