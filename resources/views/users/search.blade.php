@extends('layouts.login')

@section('content')
<form action="/search" method="post">
    <input type="text" name="keyword" placeholder="ユーザー名">
    <button type="submit"><img src="{{asset('images/search.png')}}" alt="post"></button>
    @csrf
</form>
@if(!empty($keyword))
検索ワード：{{$keyword}}
@endif
@foreach($users as $user)
<img src="{{asset('storage/'.$user->images)}}" alt="icon">
{{$user->username}}
@if(Auth::user()->isFollowing($user->id))
<a href="/unfollow/{{$user->id}}">フォロー解除</a>
@else
<a href="/follow/{{$user->id}}">フォローする</a>
@endif
@endforeach

@endsection