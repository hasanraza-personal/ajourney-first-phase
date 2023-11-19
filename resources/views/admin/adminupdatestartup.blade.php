<div class="container-fluid col-md-8 all-content all-startup">
    @foreach($allstartups as $startup)
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne{{$startup->startupsrno}}">
                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne{{$startup->startupsrno}}" aria-expanded="false" aria-controls="flush-collapseOne{{$startup->startupsrno}}">
                    {{$startup->startupname}}
                </button>
            </h2>
            <div id="flush-collapseOne{{$startup->startupsrno}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$startup->startupsrno}}" data-mdb-parent="#flush-collapseOne{{$startup->startupsrno}}">
                <div class="accordion-body">
                     <form method="post" action="../updatestartupphoto" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="startupsrno" value="{{$startup->startupsrno}}">
                        <div class="form-group">
                           <label for="exampleFormControlFile1">Select startup main photo to upload</label><br>
                           <input type="file" class="form-control-file" name="startupmainphoto" id="updatephoto_1" onchange="previewFile1(this,1);">
                        </div>
                           <div class="startup-photo">
                               <img src="{{$startup->startupmainphoto}}" id="updatepreviewimage_1" class="img-fluid" loading="lazy">
                           </div><br>
                           @if($startup->startupmainphoto!="")
                              <button class="btn btn-danger" onclick="deletestartupPhoto('{{$startup->startupmainphoto}}','startupmainphoto','{{$startup->startupsrno}}'); event.preventDefault();">Delete Photo</button><br>
                           @endif
                           <br>
                        <div class="form-group">
                           <label for="exampleFormControlFile1">Select startup first optional photo to upload</label><br>
                           <input type="file" class="form-control-file" name="startupfirstphoto" id="updatephoto_2" onchange="previewFile1(this,2);">
                        </div>
                        <div class="startup-photo">
                            <img src="{{$startup->startupfirstphoto}}" id="updatepreviewimage_2" class="img-fluid" loading="lazy"> 
                        </div><br>
                        @if($startup->startupfirstphoto!="")
                           <button class="btn btn-danger" onclick="deletestartupPhoto('{{$startup->startupfirstphoto}}','startupfirstphoto','{{$startup->startupsrno}}'); event.preventDefault();">Delete Photo</button><br>
                        @endif
                        <br>
                        <div class="form-group">
                           <label for="exampleFormControlFile1">Select startup second optional photo to upload</label><br>
                           <input type="file" class="form-control-file" name="startupsecondphoto" id="updatephoto_3" onchange="previewFile1(this,3);">
                        </div>
                        <div class="startup-photo">
                            <img src="{{$startup->startupsecondphoto}}" id="updatepreviewimage_3" class="img-fluid" loading="lazy">
                        </div><br>
                        @if($startup->startupsecondphoto!="")
                           <button class="btn btn-danger" onclick="deletestartupPhoto('{{$startup->startupsecondphoto}}','startupsecondphoto','{{$startup->startupsrno}}'); event.preventDefault();">Delete Photo</button><br>
                        @endif
                        <br>
                        <div class="form-group">
                           <label for="exampleFormControlFile1">Select startup third optional photo to upload</label><br>
                           <input type="file" class="form-control-file" name="startupthirdphoto" id="updatephoto_4" onchange="previewFile1(this,4);">
                        </div>
                        <div class="startup-photo">
                            <img src="{{$startup->startupthirdphoto}}" id="updatepreviewimage_4" class="img-fluid" loading="lazy">
                        </div><br>
                        @if($startup->startupthirdphoto!="")
                           <button class="btn btn-danger" onclick="deletestartupPhoto('{{$startup->startupthirdphoto}}','startupthirdphoto','{{$startup->startupsrno}}'); event.preventDefault();">Delete Photo</button><br>
                        @endif
                        <br>
                        <div class="form-group">
                           <label for="exampleFormControlFile1">Select startup fourth optional photo to upload</label><br>
                           <input type="file" class="form-control-file" name="startupfourthphoto" id="updatephoto_5" onchange="previewFile1(this,5);">
                        </div>
                        <div class="startup-photo">
                            <img src="{{$startup->startupfourthphoto}}" id="updatepreviewimage_5" class="img-fluid" loading="lazy">
                        </div><br>
                        @if($startup->startupfourthphoto!="")
                           <button class="btn btn-danger" onclick="deletestartupPhoto('{{$startup->startupfourthphoto}}','startupfourthphoto','{{$startup->startupsrno}}'); event.preventDefault();">Delete Photo</button><br>
                        @endif
                        <br>
                        <div class="form-group">
                           <label for="exampleFormControlFile1">Select startup fifth optional photo to upload</label><br>
                           <input type="file" class="form-control-file" name="startupfifthphoto" id="updatephoto_6" onchange="previewFile1(this,6);">
                        </div>
                        <div class="startup-photo">
                            <img src="{{$startup->startupfifthphoto}}" id="updatepreviewimage_6" class="img-fluid" loading="lazy">
                        </div><br>
                        @if($startup->startupfifthphoto!="")
                           <button class="btn btn-danger" onclick="deletestartupPhoto('{{$startup->startupfifthphoto}}','startupfifthphoto','{{$startup->startupsrno}}'); event.preventDefault();">Delete Photo</button><br>
                        @endif
                        <br>
                        <div class="form-group">
                           <label for="exampleFormControlFile1">Select startup svg to upload</label><br>
                           <input type="file" class="form-control-file" name="startupsvg" id="updatephoto_7" onchange="previewFile1(this,7);">
                        </div>
                        <div class="startup-photo">
                            <img src="{{url('startup-svg/'.$startup->startupsvg)}}" id="updatepreviewimage_7" class="img-fluid" loading="lazy">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update All Startup Photo</button><br><br>
                     </form>
                     <form method="post" action="../updatestartupdetails">
                        @csrf
                        <input type="hidden" name="startupsrno" value="{{$startup->startupsrno}}">
                        <div class="form-group">
                           <input type="text" class="form-control" name="startupname" value="{{$startup->startupname}}" placeholder="Startup Name"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="startuptype" value="{{$startup->startuptype}}" placeholder="Startup Type"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <textarea class="form-control" rows="10" placeholder="Startup details" name="startupdetails" >{{$startup->startupdetails}}</textarea>
                        </div>
                        <br>
                        <div class="form-group">
                           <textarea class="form-control" rows="10" placeholder="Startup perks" name="startupadvantages" >{{$startup->startupadvantages}}</textarea>
                        </div>
                        <br>
                        <div class="form-group">
                           <textarea class="form-control" rows="5" placeholder="Startup address" name="startupaddress" >{{$startup->startupaddress}}</textarea>
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="startuplocation" value="{{$startup->startuplocation}}" placeholder="Startup Location"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="startupmaplink" value="{{$startup->startupmaplink}}" placeholder="Startup Map Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="foundername1" value="{{$startup->foundername1}}" placeholder="Founder Name-1"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="foundername2" value="{{$startup->foundername2}}" placeholder="Founder Name-2"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="cofoundername" value="{{$startup->cofoundername}}" placeholder="Co-founder Name"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="founderdetails" value="{{$startup->founderdetails}}" placeholder="Founder Details"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="ownername1" value="{{$startup->ownername1}}" placeholder="Owner Name-1"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="ownername2" value="{{$startup->ownername2}}" placeholder="Owner Name-2"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="ownername3" value="{{$startup->ownername3}}" placeholder="Owner Name-3"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="ownername4" value="{{$startup->ownername4}}" placeholder="Owner Name-4"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="ownername5" value="{{$startup->ownername5}}" placeholder="Owner Name-5"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="ownerdetails" value="{{$startup->ownerdetails}}" placeholder="Owner Details"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="studyingin" value="{{$startup->studyingin}}" placeholder="Studying In"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="studiedat" value="{{$startup->studiedat}}" placeholder="Studied At"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="dropoutfrom" value="{{$startup->dropoutfrom}}" placeholder="Dropout From"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="selftaught" value="{{$startup->selftaught}}" placeholder="Self Taught"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="contactno1" value="{{$startup->contactno1}}" placeholder="Contact No-1" />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="contactno2" value="{{$startup->contactno2}}" placeholder="Contact No-2" />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="contactemail1" value="{{$startup->contactemail1}}" placeholder="Contact Email-1" />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="contactemail2" value="{{$startup->contactemail2}}" placeholder="Contact Email-2" />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="websitelink1" value="{{$startup->websitelink1}}" placeholder="Website Link-1" />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="websitelink2" value="{{$startup->websitelink2}}" placeholder="Website Link-2" />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="applink" value="{{$startup->applink}}" placeholder="App Link" />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="startupemail" value="{{$startup->startupemail}}" placeholder="Startup Email"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="facebooklink" value="{{$startup->facebooklink}}" placeholder="Facebook Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="instagramlink" value="{{$startup->instagramlink}}" placeholder="Instagram Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="linkedinlink" value="{{$startup->linkedinlink}}" placeholder="Linkedin Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="pinterestlink" value="{{$startup->pinterestlink}}" placeholder="Pinterest Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="telegramlink" value="{{$startup->telegramlink}}" placeholder="Telegram Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="twitterlink" value="{{$startup->twitterlink}}" placeholder="Twitter Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="whatsapplink1" value="{{$startup->whatsapplink1}}" placeholder="Whatsapp Link 1"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="whatsapplink2" value="{{$startup->whatsapplink2}}" placeholder="Whatsapp Link 2"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="youtubelink" value="{{$startup->youtubelink}}" placeholder="Youtube Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="flipcartlink" value="{{$startup->flipcartlink}}" placeholder="Flipcart Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="amazonlink" value="{{$startup->amazonlink}}" placeholder="Amazon Link"  />
                        </div>
                        <br>
                        <div class="form-group">
                           <input type="text" class="form-control" name="swiggylink" value="{{$startup->swiggylink}}" placeholder="Swiggy Link"  />
                        </div>
                        <br>
                          <div class="form-group">
                           <input type="text" class="form-control" name="zomatolink" value="{{$startup->zomatolink}}" placeholder="Zomato Link"  />
                        </div>
                          <br>
                          <div class="form-group">
                            <input type="text" class="form-control" name="magicpinlink" value="{{$startup->magicpinlink}}" placeholder="Magicpin Link"  />
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning">Update Startup Details</button>
                    </form><br>
                    <form method="post" action="../deletestartup">
                        @csrf
                        <input type="hidden" name="startupsrno" value="{{$startup->startupsrno}}">
                        <button class="btn btn-danger">Delete Startup</button>
                    </form>
                </div>
            </div>
        </div>
    </div><br>
    @endforeach
</div>
