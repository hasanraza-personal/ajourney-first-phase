<div class="boosters">
    MemeSpace <span>Booster's</span> 
    <span>
    <i class="fas fa-exclamation-circle" style="color: rgb(129, 138, 120); margin-right: 10px;" data-mdb-toggle="tooltip" title="Swipe left to see more Boosters!"></i>
    <i class="fas fa-arrow-right"></i>
    </span>
    <div id="hide_booster" style="display: none; padding-top: 8px; cursor: pointer; font-size: 14px; color: #000;" onclick="hide_booster()">Hide Booster's</div>
</div>
<div class="trending dragscroll">
    <div class="genre-1">
        <a href="{{url('startup/allstartup')}}">
            <img src="w-images/startup-story.jpg" style="filter: brightness(110%)" class="trending-1 sts-pg">
        </a>
    </div>
    @foreach($maintopic as $maintopics)
        <div class="genre-1">
            <a href="{{url('knowledge/'.$maintopics->maintopic)}}">
                <img src="{{"../w-images/".$maintopics->maintopicphoto}}" class="trending-1">
                <div class="caption">
                    <span>{{$maintopics->maintopic}}</span>
                </div>
            </a>
        </div>

    @endforeach
</div>