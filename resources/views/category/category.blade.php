@extends('layouts.main')
@section('title', 'category')
@section('content')
<h1>Category List</h1>

<div class="mt-4 d-flex justify-content-end justify-content-end">
    <a href="/category-add" class="btn btn-primary">Add Category</a>
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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="/category-edit/{{$item->slug}}" class="btn btn-success justify-content-end">Edit</a>
                        <a href="#" class="btn btn-danger justify-content-end">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>






 
@endsection