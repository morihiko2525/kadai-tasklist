@extends('layouts.app')

@section('content')
    
    <h1>id = {{ $tasks->id }} のタスク詳細</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $tasks->id }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $tasks->content }}</td>
        </tr>
        
        <tr>
            <th>ステータス</th>
            <td>{{ $tasks->status }}</td>
        </tr>
    </table>
    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('tasks.edit', 'タスクを編集', ['task' => $tasks->id], ['class' => 'btn btn-light']) !!}
    {{-- メッセージ削除フォーム --}}
    {!! Form::model($tasks, ['route' => ['tasks.destroy', $tasks->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection