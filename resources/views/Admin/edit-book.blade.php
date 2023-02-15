@extends('layouts.main')

@section('title', 'Edit Book')


@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h1>Edit Book</h1>

<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <label for="book_code" class="form-label">Book Code</label>
    <input type="text" name="book_code" id="book_code" class="form-control w-50" placeholder="Book Code" 
    class="form-control" value="{{$books->book_code}}">
     
    <label for="title" class="form-label">Tittle</label>
    <input type="text" name="tittle" id="title" class="form-control w-50" placeholder="tittle" value="{{$books->tittle}}">

    <label for="text" class="form-label">Status</label>
    <input type="status" name="status" id="status" class="form-control w-50" placeholder="status" value="{{$books->status}}">
    <div class="mb-3">
    <label for="currentCover" class="form-label d-block">currentCover</label>
    @if($books->cover != '')
     <img src="{{asset('storage/cover/'.$books->cover)}}"alt=""width="80px" >
    @else
     <img src="{{asset('img/not_found.jpg')}}"alt=""width="80px">
    @endif
    </div>

    <label for="image" class="form-label">Cover</label>
    <input type="file" name="image" id="image" class="form-control w-50" placeholder="cover">

    <label for="categories" class="form-label">Category</label>
    <select name="categories[]" id="categories" class="form-control select w-50">
     @foreach($categories as $item)
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach   
    </select>   

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>$(document).ready(function() {
    $('.select').select2();
});</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
