@extends('layouts.app')

@section('content')

@if (Auth::check())
    {{ Auth::user()->name }}の
    <h1>タスク一覧</h1>

    @if (count($tasks) > 0)
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endif
    
    @if (Auth::check())
        {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}
        {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'btn btn-primary']) !!}
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the TaskList</h1>
            {!! link_to_route('signup.get', '新規ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
    
@endsection