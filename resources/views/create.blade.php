@extends('layout.app')

@section('title')
    Halaman Buat Data
@endsection

@section('body')
    <form action="{{ route('post.store') }}" method="POST">
        {{csrf_field()}}
        <label for="title">Judul</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="body">Isi</label>
        <textarea name="body" id="body"></textarea>
        <br>
        <button type="submit">submit</button>
    </form>
@endsection