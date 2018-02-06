@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        @foreach ($users as $user)
                            <article>
                                <h4>
                                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                                </h4>
                            </article>
                            <div class="body">{{ $user->id }}</div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


