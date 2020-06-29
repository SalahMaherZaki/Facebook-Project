<p>
    <a href="{{ url('posts/' . $post->id . '/like') }}">
        <i class="fa fa-heart btn like" style="font-size: 30px;color: red" aria-hidden="true"></i>
    </a>
    {{ $post->likes()->count() }}
</p>
