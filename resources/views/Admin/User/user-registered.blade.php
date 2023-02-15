@extends('layouts.main')

@section('title', 'Registered User')

@section('content')
<h1>List Registered User</h1>
<div class="mt-4 d-flex justify-content-end">

    <a href="/users" class="btn btn-primary">Approve User Lits</a>
</div>
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <td>NO.</td>
                <td>Username</td>
                <td>Phone</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach($userRegistered as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    <a href="/users-detail/{{$item->slug}}" class="btn btn-secondary">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection