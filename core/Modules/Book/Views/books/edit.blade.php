@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6 m-0 m-auto">
            <form action="{{route('Book.books.update',[$item->id])}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PATCH">
                @if(isset($errors->all()[0]))
                    <p class="alert-danger">{{$errors->all()[0]}}</p>
                @endif
                <table class="edit-table">
                    <tr>
                        <td><span for="">Titile</span></td>
                        <td><input type="text" name="title" value="{{$item->title}}"></td>
                    </tr>
                    <tr>
                        <td><div for="">Author</div></td>
                        <td><input type="text" name="author" value="{{$item->author}}"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Submit"></td>
                    </tr>
                </table>

            </form>

        </div>
    </div>
@endsection
