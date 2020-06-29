<script type="text/javascript">
function uploadProfileImage(){
    var form_name = '#form-new-image';
    $(form_name+' .image-input').click();
}
</script>
<div class="panel panel-default">
    <div class="panel-body">
        <img src="/uploads/avatars/{{ $user->avatar }}" class="img-responsive" alt="Responsive image" style="
    width: 200px;
    height: 200px;
    border: 7px solid #c8d6f7;
    border-radius:50%;
    margin:0px auto;
    ">
          @if(Auth::user() == $user)
          <div style="
                    margin: 20px auto;
                    height: 51px;
                    width: 90%;
                    background-color:white;
                    border-radius: 10px;
                    text-align: center;">
          </div>
        @endif
        <br>

        <div>
            <div class="col-sm-4 text-center">
             <div class="panel-body cycle" style="background:#3489eb">
               <span>{{ $user->posts->count() }}</span>
             </div>
             <span >Posts</span>
            </div>
            <div class="col-sm-4 text-center">
             <div class="panel-body cycle" style="background:#45bab6">
               <span> 500 </span>
             </div>
             <span>Following</span>
            </div>
            <div class="col-sm-4 text-center">
             <div class="panel-body cycle" style="background:#b074cc">
              <span> 700 </span>
             </div>
             <span>Followers</span>
            </div>
        </div>
        <div class="clear"></div><br>
</div>
</div>

      <div class="panel panel-primary follow">
        <div class="panel-heading" id="start_follow" style="color: white;text-transform:capitalize">{{ $user->username }}'s details</div>
        <div style="padding-left:10px;">
          <h2 style="text-transform: capitalize;"></h2>
          <p><i class="fa fa-user" ></i> &nbsp; <a href="/{{ $user->username }}">{{ '@' . $user->username }}</a></p>
          <p><i class="fa fa-phone" ></i> &nbsp; {{ $user->phone}}</p>
          <p><i class="fa fa-birthday-cake" ></i> &nbsp; {{ \Carbon\Carbon::parse($user->birthday)->format('j F Y') }}</p>
          <p><i class="fa fa-map-marker" ></i> &nbsp; {{ $user->location }}</p>
        </div>
      </div>
