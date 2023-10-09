@extends('layouts.login')

@section('content')

@foreach($users as $user)
<a href="/profile/{{$user->id}}"><img src="{{asset('storage/'.$user->images)}}" alt="icon"></a>
@endforeach

@foreach($posts as $post)
<a href="/profile/{{$post->user->id}}"><img src="{{asset('storage/'.$post->user->images)}}" alt="icon"></a>
{{$post->user->username}}
{{$post->post}}
{{$post->created_at->format('Y-m-d H:i')}} 
@endforeach

@endsection