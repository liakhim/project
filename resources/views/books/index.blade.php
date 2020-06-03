@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

        </div>
        <div class="row col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row col-sm-12">
            <a  href="{{route('books.create')}}" class="btn btn-success">
                Добавить книгу
            </a>
        </div>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Автор</th>
                <th scope="col" style="text-align: right">CRUD</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td style="display: flex;justify-content: flex-end;">
                    <a class="btn btn-primary" href="{{route('books.edit',$book)}}" style="margin: 0 3px">edit</a>
                    <form action="{{ route('books.destroy', $book)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection