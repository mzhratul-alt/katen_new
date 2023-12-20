@if ($reply->replies->count() > 0)
@foreach ($reply->replies as $reply)
<li class="comment rounded child">
    <div class="thumb">
        <img style="width: 50px"
            src="{{ $reply->user->profile ? asset('storage/users/'.$reply->user->profile) : env('DUMMY_IMG'). $reply->user->name}}"
            alt="{{ $reply->user->name }}" />
    </div>
    <div class="details">
        <h4 class="name"><a href="blog-single.html#">{{ $reply->user->name }}</a></h4>
        <span class="date">{{ \Carbon\Carbon::parse($reply->created_at)->format('M d, Y h:i:s A') }}</span>
        <p>{{ $reply->content }}</p>
        <a class="reply_btn" href="#comment_form" data-parent-id="{{ $reply->id }}"
            class="btn btn-default btn-sm">Reply</a>
    </div>
</li>
@include('utility.reply')
@endforeach
@endif


