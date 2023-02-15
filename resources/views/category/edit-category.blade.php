@extends('layouts.main')
@section('title', 'Add Category')
@section('content')
<h1>Update Category</h1>
@if ($errors->any())
<div class="alert alert-danger w-50">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/category-edit/{{$category->slug}}" method="post" class="mt-4">
    @csrf
    @method('put')


    <label for="name" class="form-label">Category </label>
    <input type="text" class="form-control w-50" name="name" id="name" value="{{$category->name}}">
    <button type="submit" class="btn btn-success mt-3">Save</button>


</form>








@endsection