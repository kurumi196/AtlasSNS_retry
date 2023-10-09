@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
<form action="/post/create" method="post">
    <input type="text" name="post" placeholder="投稿内容を入力してください。">
    <button type="submit"><img src="{{asset('images/post.png')}}" alt="post"></button>
    @csrf
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@foreach($posts as $post)
<img src="{{asset('storage/'.$post->user->images)}}" alt="icon">
{{$post->user->username}}
{{$post->post}}
{{$post->created_at->format('Y-m-d H:i')}} 
@if($post->user_id == Auth::id())
<!-- https://zenn.dev/y640/articles/qiita-20191227-f5b054d05d86bc3de289 https://www.flatflag.nir87.com/date-473 -->
<button class="modal-open" data-post="{{$post->post}}" data-id="{{$post->id}}"><img src="{{asset('images/edit.png')}}" alt=""></button>
<button class="delete_btn"><a href="/post/delete/{{$post->id}}"><img src="{{asset('images/trash.png')}}" alt=""></a></button>
@endif
@endforeach

<!-- モーダル本体 -->
<div class="modal-container">
	<div class="modal-body">
		<!-- モーダル内のコンテンツ -->
		<div class="modal-content">
            <form action="/post/edit" method="post">
                @csrf
                <input type="text" name="post" value="" class="modal-post">
                <input type="hidden" name="post_id" value="" class="modal-id">
                <button type="submit"><img src="{{asset('images/edit.png')}}" alt=""></button>
            </form>
		</div>
	</div>
</div>
@endsection