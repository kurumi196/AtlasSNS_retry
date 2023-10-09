@extends('layouts.login')

@section('content')
@if($id==0)
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/profile/update" method="post" enctype="multipart/form-data">
    @csrf
{{ Form::label('user name') }}
{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}

{{ Form::label('mail address') }}
{{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::label('password confirm') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}

{{ Form::label('bio') }}
{{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}

{{ Form::label('icon image') }}
{{ Form::file('images',['class' => 'input']) }}

{{ Form::submit('登録') }}
</form>

@else
<img src="{{asset('storage/'.$user->images)}}" alt="icon">
{{$user->username}}
{{$user->bio}}
@if(Auth::user()->isFollowing($user->id))
<a href="/unfollow/{{$user->id}}">フォロー解除</a>
@else
<a href="/follow/{{$user->id}}">フォローする</a>
@endif
@foreach($posts as $post)
<img src="{{asset('storage/'.$post->user->images)}}" alt="icon">
{{$post->user->username}}
{{$post->post}}
{{$post->created_at->format('Y-m-d H:i')}} 
@endforeach
@endif

@endsection