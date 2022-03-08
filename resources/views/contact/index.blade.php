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

                    {{ __('this is index page!') }}
                    <br>
                    <a href="{{ route('contact.create') }}" class="btn btn-primary mt-2">お問合せ作成</a>
                    <div class="mt-5">
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-success text-white">
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">title</th>
                                    <th scope="col">contact</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">show_button</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->title }}</td>
                                        <td>{{ $contact->contact }}</td>
                                        <td>{{ $contact->created_at }}</td>
                                        <td><a href="{{ route('contact.show', ['id' => $contact->id ]) }}">詳細</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection