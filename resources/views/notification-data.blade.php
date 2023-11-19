<?php
    function time_elapsed_string($posttime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($posttime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v){
            if ($diff->$k){
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }else{
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
?>
@foreach($notifications as $notification)
    @if($notification->notificationresponce == "like")
     <!--   <a href="{{url("post/".$notification->notificationpost)}}"> -->
            <div class="main-notification">
                <div class="notification-profilephoto text-center">
                    <img src="{{ $notification->profile_photo }}" class="rounded-circle" height="40px" width="40px" alt="" loading="lazy" />
                </div>
                <div class="notification-details">
                    <div class="notification-usernotification"><b>{{$notification->notificationusername}}</b> has reacted 
                    <span><img style="height: 22px; transform: rotate(-25deg);" src="{{"web-images/haha.svg"}}"></span> to your post.</div>
                    <div class="notification-notification-time">{{time_elapsed_string($notification->notification_created)}}</div>
                </div>
                <div class="notification-notificationpost">
                    <img src="{{"images/".$notification->notificationpost}}" class="notification-postimage" alt="" loading="lazy" />
                </div>  
            </div>
     <!--   </a> -->
    @endif

    @if($notification->notificationresponce == "dislike")
      <!--  <a href="{{url("post/".$notification->notificationpost)}}"> -->
            <div class="main-notification">
                <div class="notification-profilephoto text-center">
                    <img src="images/other.png" class="rounded-circle" height="40" alt="" loading="lazy" />
                </div>
                <div class="notification-details">
            
                    <div class="notification-usernotification"><b>{{$notification->notificationusername}}</b> has reacted 
                    <span><img style="height: 22px; transform: rotate(-25deg);" src="{{"web-images/angry.svg"}}"></span> to your post.</div>
                    <div class="notification-notification-time">{{time_elapsed_string($notification->notification_created)}}</div>
                </div>
                <div class="notification-notificationpost">
                    <img src="{{"images/".$notification->notificationpost}}" class="notification-postimage" alt="" loading="lazy" />
                </div>  
            </div>
       <!-- </a> -->
    @endif

    @if($notification->notificationcomment == 1)
        <!--<a href="{{url("post/".$notification->notificationpost)}}">-->
            <div class="main-notification">
                <div class="notification-profilephoto text-center">
                    <img src="images/other.png" class="rounded-circle" height="40" alt="" loading="lazy" />
                </div>
                <div class="notification-details">
                    <div class="notification-notification-comment"><b>{{$notification->notificationusername}}</b> has commented on your post.</div>
                    <div class="notification-notification-time">{{time_elapsed_string($notification->notification_created)}}</div>
                </div>
                <div class="notification-notificationpost">
                    <img src="{{"images/".$notification->notificationpost}}" class="notification-postimage" alt="" loading="lazy" />
                </div>  
            </div>
       <!-- </a>-->
    @endif
@endforeach