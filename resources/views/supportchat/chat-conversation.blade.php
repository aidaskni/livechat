@extends('layouts.app')
@section('title')
    {{$conversation->title}}
@endsection
@section('content')
    <div id="supportchat-app">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>{{$conversation->title}}</h2>
                            <div class="right"><a href="{{route('conversations.clear', $conversation->id)}}">Clear messages</a></div>
                        </div>
                        <chat-log v-bind:messages="messages"></chat-log>
                        <chat-composer v-on:sendmessage="addMessage" username="{{$support->name}}"></chat-composer>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ids = {{$conversation->id}};
    </script>
@endsection
