@extends('layouts.main')

@section('title', 'add-category')

@section('content')
<h1>ini halaman add-category</h1>
<form action="" method="post">
    @csrf

    <label for="name" class="form-label">Category Name</label>
    <input type="text" name="name" id="name" class="form-control w-50">
    <button type="submit" class="btn btn-primary mt-2">Save</button>
</form>
@endsection