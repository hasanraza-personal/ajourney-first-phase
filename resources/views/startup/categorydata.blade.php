
@foreach($categories as $startupcategory)
<?php $startuplink1 = str_replace(' ', '+', $startupcategory->startupname);?>
  <a class="s-startup" href="{{url('startup/'.$startuplink1)}}">
      <div class="img-box">
        <img src="{{url("startup/".$startupcategory->startupmainphoto)}}" alt="...">
      </div>
    <div class="s-startup-content">
      <p class="s-startup-tags">
        <span class="s-startup-tag1">{{$startupcategory->startuptype}}</span>
        <span class="s-startup-tag2">New !!</span>
      </p>
        <div class="s-startup-title">{{$startupcategory->startupname}}</div>
        {{-- <p class="s-startup-desc">{!! \Illuminate\Support\Str::limit($startupcategory->startupdetails,125,"...") !!}</p> --}}
        <div class="founder-details">
          <div class="founder-name no-crousal">
            @if($startupcategory->foundername2!="")
              <span>Founders:</span> <br><i class="bi bi-person"></i> {{$startupcategory->foundername1}}<br><i class="bi bi-person"></i> {{$startupcategory->foundername2}}<br>
            @elseif($startupcategory->foundername1!="")
              <span>Founder:</span> <br><i class="bi bi-person"></i> {{$startupcategory->foundername1}}<br>
            @endif

            @if($startupcategory->cofoundername!="")
              <span>Founder:</span> <br><i class="bi bi-person"></i> {{$startupcategory->cofoundername}}<br>
            @endif

            @if($startupcategory->ownername5!="")
              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startupcategory->ownername1}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername2}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername3}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername4}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername5}}<br>
            @elseif($startupcategory->ownername4!="")
              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startupcategory->ownername1}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername2}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername3}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername4}}<br>
            @elseif($startupcategory->ownername3!="")
              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startupcategory->ownername1}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername2}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername3}}<br>
            @elseif($startupcategory->ownername2!="")
              <span>Owners:</span> <br><i class="bi bi-person"></i> {{$startupcategory->ownername1}}<br><i class="bi bi-person"></i> {{$startupcategory->ownername2}}<br>
            @elseif($startupcategory->ownername1!="")
              <span>Owner:</span> <br><i class="bi bi-person"></i> {{$startupcategory->ownername1}}<br>
            @endif
          </div>
          <div class="founder-clgname">
            @if($startupcategory->studyingin!="")
              Studying in <b>{{$startupcategory->studyingin}}</b><br>
            @endif
            @if($startupcategory->studiedat!="")
              Studied at <b>{{$startupcategory->studiedat}}</b><br>
            @endif
            @if($startupcategory->selftaught!="")
              Self taught <b>{{$startupcategory->selftaught}}</b><br>
            @endif
            @if($startupcategory->dropoutfrom!="")
              Dropout from <b>{{$startupcategory->dropoutfrom}}</b><br>
            @endif
            @if($startupcategory->founderdetails!="")
              <b>{{$startupcategory->founderdetails}}</b>
            @endif
          </div>
        </div>
    </div>
    <?php //$special = array(" ", "'");$replace = array('%', '&');$startuplink = str_replace($special,$replace,$startup->startupname);
        $startuplink = str_replace(' ', '+', $startupcategory->startupname);?>
    {{-- <a class="btn btn-secondary vd-btn new-btn" href="{{url('startup/'.$startuplink)}}">View details</a> --}}
</a>
@endforeach
