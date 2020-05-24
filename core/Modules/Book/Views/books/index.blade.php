@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 m-auto m-0">
            <table border="1" class="list-table">
                <thead>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Create by</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->author}}</td>
                            <td>{{$item->user->name}}</td>
                            <td><a href="{{route('Book.books.edit',[$item->id])}}">Edit</a></td>
                            <td>
                                <form method="POST" action="{{route('Book.books.destroy',[$item->id])}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginate">{{ $items->links() }}</div>
            <a class="add-book" href="{{route('Book.books.create')}}">Add Book</a>

        </div>
    </div>
@endsection
