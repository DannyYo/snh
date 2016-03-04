@extends('home')
@section('title', '个人动态')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <p>DannyYo ‏@dannyyo_yo  Jan 25 </p>
    </div>
    <div class="panel-body">
        <p>
            {{ $moment->content }}
            Just setting up my Twitter. #myfirstTweet <br>
            <i class="fa fa-ellipsis-h"></i>
        </p>
    </div>
    <div class="panel-footer">
        <p>
        <div class="details">
            <ul class="nav nav-pills status">
                <li ><a href="#">Keep<span class="badge">295</span></a></li>
                <li class="like"><a href="#">Like<span class="badge">156</span></a></li>
                <li >
                    <div class="details-people">
                        <img src="https://pbs.twimg.com/profile_images/691828194933104641/N4rWw_AG_normal.jpg" height="15px" width="15px">
                        <img src="https://pbs.twimg.com/profile_images/691828194933104641/N4rWw_AG_normal.jpg" height="15px" width="15px">
                        <img src="https://pbs.twimg.com/profile_images/691828194933104641/N4rWw_AG_normal.jpg" height="15px" width="15px">
                        <img src="https://pbs.twimg.com/profile_images/691828194933104641/N4rWw_AG_normal.jpg" height="15px" width="15px">
                    </div>
                </li>
            </ul>
            {{ $moment->created_at }}  <br>
        </div>

        <a name="reply">Reply <i class="fa fa-reply"></i></a>
        <a href="#">Like <i class="fa fa-thumbs-o-up"></i></a>
        <a href="#">Keep <i class="fa fa-star"></i></a></p>
        <div class="comment"></div>
    </div>
</div>
@endsection