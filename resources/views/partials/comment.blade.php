@foreach($post->comments as $comment)
  <div class="comment_body" style="background-color: #f2f3f5;
                                  border-radius: 10px;
                                  padding: 10px;">
    <div class="media-left">
        <a href="{{ url($comment->user->username) }}">
            <img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/avatars/{{ $comment->user->avatar }}" alt="avatar" style=" background-color: width: 64px; height: 64px; border-radius:50%">
        </a>
    </div>
    <div class="media-body cm">
      <a href="{{ url($comment->user->username) }}">
          <span class="cm-name"> {{ $comment->user->name }}</span>
        <small>
            {{ '@' . $comment->user->username }}
        </small>
      </a>
      <small>
        &bull; {{ $comment->created_at->diffForHumans() }}
      </small>

      @if(Auth::user()->id == $comment->user_id)
                            <a href="{{ url('comments/' . $comment->id) }}"
                               onclick="event.preventDefault();
                                        document.getElementById('delete-comment-form').submit();">
                                <i class="pull-right fa fa-trash" style="font-size: 30px" aria-hidden="true"></i>
                            </a>

                            <form id="delete-comment-form" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        @endif

      <div class="cm-body">
        {{ $comment->body }}
      </div>
    </div>
  </div>
  <br>
@endforeach
