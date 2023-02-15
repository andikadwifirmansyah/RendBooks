@extends('layouts.main')
@section('title', 'books')
@section('content')
<h1>Book List</h1>

<div class="mt-4 d-flex justify-content-end justify-content-end">
    <a href="/book-add" class="btn btn-primary">Add Book</a>
</div>
@if(session('status'))
    <div class="alert alert-success mt-3">
        {{ session('status') }}
    </div>
@endif    

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>book code</th>
                    <th>title</th>
                    <th>Cover</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $value)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->book_code}}</td>
                    <td>{{$value->tittle}}</td>
                    <td>
                    @if($value->cover != '')
                   <img src="{{asset('storage/cover/'.$value->cover)}}"alt=""width="80px" >
                    @else
                   <img src="{{asset('img/not_found.jpg')}}"alt=""width="80px">
                    @endif
                    </td>
                    <td>
                        @foreach($value->categories as $category)
                        {{$category->name}}
                        @endforeach
                    </td>
                    <td>{{$value->status}}</td>
                    <td>
                        <a href="/books-edit/{{$value->slug}}" class="btn btn-success justify-content-end">Edit</a>
                        <a href="/books-delete/{{$value->slug}}" class="btn btn-danger justify-content-end">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>






 
@endsection