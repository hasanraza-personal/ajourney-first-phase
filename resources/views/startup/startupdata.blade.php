

@foreach($startups as $startup)

<?php $startuplink1 = str_replace(' ', '+', $startup->startupname);?>

  <a class="s-startup" href="{{url('startup/'.$startuplink1)}}">

      <div class="img-box">

        <img src="{{"../startup/".$startup->startupmainphoto}}" alt="...">

      </div>

    <div class="s-startup-content">

      <p class="s-startup-tags">

        <span class="s-startup-tag1">{{$startup->startuptype}}</span>

        <?php

          date_default_timezone_set('Asia/Kolkata');

          $startTime = date("Y-m-d H:i:s");

          //add 2 days to time

          $two_days = date('Y-m-d H:i:s',strtotime('+2880 minutes',strtotime($startup->startupregistered)));

          $current_day = date("Y-m-d H:i:s");

        ?>

      

      </p>

        <div class="s-startup-title">{{$startup->startupname}}</div>

        {{-- <p class="s-startup-desc">{!! \Illuminate\Support\Str::limit($startup->startupdetails,125,"...") !!}</p> --}}

        <div class="founder-details">

          <div class="founder-name fd-name">

            @if($startup->foundername2!="")

              <span>Founders:</span> <br><i class="bi bi-person"></i> {{$startup->foundername1}}<br><i class="bi bi-person"></i> {{$startup->foundername2}}<br>

            @elseif($startup->foundername1!="")

              <span>Founder:</span> <br><i class="bi bi-person"></i> {{$startup->foundername1}}<br>

            @endif



            @if($startup->cofoundername!="")

              <span>Founder:</span> <br><i class="bi bi-person"></i> {{$startup->cofoundername}}<br>

            @endif



            @if($startup->ownername5!="")

              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startup->ownername1}}<br><i class="bi bi-person"></i> {{$startup->ownername2}}<br><i class="bi bi-person"></i> {{$startup->ownername3}}<br><i class="bi bi-person"></i> {{$startup->ownername4}}<br><i class="bi bi-person"></i> {{$startup->ownername5}}<br>

            @elseif($startup->ownername4!="")

              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startup->ownername1}}<br><i class="bi bi-person"></i> {{$startup->ownername2}}<br><i class="bi bi-person"></i> {{$startup->ownername3}}<br><i class="bi bi-person"></i> {{$startup->ownername4}}<br>

            @elseif($startup->ownername3!="")

              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startup->ownername1}}<br><i class="bi bi-person"></i> {{$startup->ownername2}}<br><i class="bi bi-person"></i> {{$startup->ownername3}}<br>

            @elseif($startup->ownername2!="")

              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startup->ownername1}}<br><i class="bi bi-person"></i> {{$startup->ownername2}}<br>

            @elseif($startup->ownername1!="")

              <span>Owner:</span> <br><i class="bi bi-person"></i> {{$startup->ownername1}}<br>

            @endif

          </div>

          <div class="founder-clgname">

            @if($startup->studyingin!="")

              Studying in <b>{{$startup->studyingin}}</b><br>

            @endif

            @if($startup->studiedat!="")

              Studied at <b>{{$startup->studiedat}}</b><br>

            @endif

            @if($startup->selftaught!="")

              Self taught <b>{{$startup->selftaught}}</b><br>

            @endif

            @if($startup->dropoutfrom!="")

              Dropout from <b>{{$startup->dropoutfrom}}</b><br>

            @endif

            @if($startup->founderdetails!="")

              <b>{{$startup->founderdetails}}</b>

            @endif

          </div>

        </div>

     </div>

     <?php //$special = array(" ", "'");$replace = array('%', '&');$startuplink = str_replace($special,$replace,$startup->startupname);

        $startuplink = str_replace(' ', '+', $startup->startupname);?>

     {{-- <a class="btn btn-secondary vd-btn new-btn" href="{{url('startup/'.$startuplink)}}">View details</a> --}}

    </a>

@endforeach

