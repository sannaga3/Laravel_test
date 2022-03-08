@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('this is show page!') }}
                    <br>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary mt-2">お問合せ一覧</a>
                </div>
                <div class="mt-5">
                    <p>id : {{ $contact->id }}</p>
                    <p>name : {{ $contact->name }}</p>
                    <p>email : {{ $contact->email }}</p>
                    <p>url : {{ $contact->url }}</p>
                    <p>gender : {{ $contact->gender }}</p>
                    <p>age : {{ $contact->age }}</p>
                    <p>title : {{ $contact->title }}</p>
                    <p>contact : {{ $contact->contact }}</p>
                </div>
                <div class="d-flex flex-row justify-content-left">
                    <a href="{{ route('contact.edit', ['id' => $contact->id]) }}" class="btn btn-info mx-3">編集</a>
                    <form action="{{ route('contact.destroy', ['id' => $contact->id]) }}" method="POST" id="delete_{{ $contact->id }}">
                        @csrf
                        <a href="#" class="btn btn-danger" data-id="{{ $contact->id }}" onclick="deletePost(this);">削除</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除しますか？')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>
@endsection