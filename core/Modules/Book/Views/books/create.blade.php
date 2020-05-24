@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6 m-0 m-auto">
            <form action="{{route('Book.books.store')}}" method="POST">
                <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                @if(isset($errors->all()[0]))
                    <p class="alert-danger">{{$errors->all()[0]}}</p>
                @endif
                <table class="edit-table">
                    <tr>
                        <td><span for="">Titile</span></td>
                        <td><input type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td><div for="">Author</div></td>
                        <td><input type="text" name="author"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Submit"></td>
                    </tr>
                </table>

            </form>

        </div>
    </div>
@endsection
