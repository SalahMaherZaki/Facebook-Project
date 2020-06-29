<script>
function uploadPostImage(){
    var form_name = '#form-new-post';
    $(form_name+' .image-inputs').click();
}

</script>

<script src="{{ asset('lib/Postscript.js') }}"></script>

<div class="panel panel-default"style="background-color:transparent">
        <div class="panel-heading">
            <div class="media"style="padding: 20px 10px;">
                <div class="media-left">
                    <a href="{{ url($user->username) }}">
                        <img class="media-object" src="uploads/avatars/{{ $user->avatar }}" alt="avatar" style="width: 64px; height: 64px; border-radius:50%">
                    </a>
                </div>
                <div class="media-body">
                    <form method="post" action="/posts" enctype="multipart/form-data" id="form-new-post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                            <textarea name="body" id="body" class="form-control" style="resize: none" rows="5" placeholder="What's New...?" required autofocus>{{ old('body') }}</textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                        </div>

                          <button type="button" class="btn btn-default btn-add-image btn-sm posts_add" onclick="uploadPostImage()">
                              <i class="fa fa-image"></i> Add Image
                          </button>
                          <input type="file" name="url" id="url" style="display:none" class="image-inputs">

                        <button type="submit" onClick="submit_by_id()" class="pull-right btn btn-lg btn-warning">Post</button>
                    </form>

                </div>
            </div>
        </div>
      </div>
    <div class="panel-body"style="background-color:transparent">

        @foreach($posts as $post)
          <div class="panel panel-default">
            <div class="media" style="padding: 20px 10px;">
                <div class="media-left">
                    <a href="{{ url($user->username) }}">
                        <img class="media-object" src="uploads/avatars/{{ $post->user->avatar }}" alt="avatar" style="width: 64px; height: 64px;border-radius:50%">
                    </a>
                </div>
                <div class="container media-body">
                    <h4 class="row media-heading">
                        <a href="{{ url($post->user->username) }}">
                            {{ $post->user->username }}
                        </a>
                        <br>
                        <small class="float-right">
                           {{ $post->created_at->diffForHumans() }}
                        </small>

                        @if(Auth::user()->id == $post->user_id)
                            <a href="{{ url('posts/' . $post->id) }}"
                               onclick="event.preventDefault();
                                        document.getElementById('delete-post-form').submit();">
                                <i class="pull-right fa fa-trash" style="font-size: 30px" aria-hidden="true"></i>
                            </a>

                            <form id="delete-post-form" action="{{ url('posts/' . $post->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        @endif
                    </h4>
                      <hr style="margin-top:0px;">
                        {!! $post->body !!}
                        <br>
                      @if($post->url != NULL)
                          <a href="/uploads/posts/{{$post->url}}">
                              <img style="width:90%; height:400px;" src="/uploads/posts/{{$post->url}}" alt="post-photo">
                          </a>
                      @endif
                      <div style="margin-top:10px">
                        <div class="pull-left">
                          @include('partials.like')
                        </div>
                        <div class="comments-title text-center">
                            <p class="text-muted"><i class="fa fa-comment" style="font-size: 30px;" aria-hidden="true"></i>
                              <small>0</small>
                            </p>
                        </div>
                      </div>
                @include('partials.comment')

                <div class="panel-body">
                  <form action="{{url('posts/' . $post->id . '/store') }}" method="post">
                      {{ csrf_field() }}
                  <div class="form-group">
                    <textarea name="body" placeholder="Write Comment..." id="body" rows="3" style='resize:none' class="container form-control" style="width:100%;height:40px"></textarea>
                  </div>

                  <div class="form-group add_comment">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                  </div>
                  </form>
                </div>

              </div>
          </div>
            </div>
        @endforeach


    </div>
