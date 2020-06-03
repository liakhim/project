@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
            <h3>Редактирование книги</h3>
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{route('books.update',$book->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Название</label>
                        <input name="title" value="{{$book -> title}}" type="text" class="form-control" id="book-title">
                    </div>
                    <div class="form-group">
                        <label for="book-author">Автор</label>
                        <input name="author" value="{{$book -> author}}" type="text" class="form-control" id="book-author">
                    </div>
                    <button class="btn btn-success" type="submit">Редактировать</button>
                </form>
            </div>
        </div>
    </div>
@endsection