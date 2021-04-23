@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    {{-- メッセージ作成ページへのリンク --}}
    
    {{--　ログインチェック --}}
    @if (Auth::check())
        {{ Auth::user()->name }}
        <h1>ログイン中です</h1>
        <h1>タスク一覧</h1>
        {!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'btn btn-primary']) !!} 
        
        {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        
         @if (count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>タスク</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $tasks)
                        @if($tasks->user_id == Auth::user()->id)
                        <tr>
                            <td>{!! link_to_route('tasks.show', $tasks->id, ['task' => $tasks->id]) !!}</td>
                            <td>{{ $tasks->content }}</td>
                            <td>{{ $tasks->status }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
         @endif
    @else
        <h1>ログインしていません</h1>
        <div class="center jumbotron">
            <div class="text-center">
                <h1>アカウントを作成するかログインをしてください</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>

    @endif
@endsection