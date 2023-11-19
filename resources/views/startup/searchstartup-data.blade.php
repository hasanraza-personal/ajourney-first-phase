<?php
   $startup_images_count = count($startupimages);
?>
@for($i = 0; $i < $startup_images_count; $i++)
   <div>
      <div style="display: flex; justify-content: center;">
      {{-- Left side two Images --}}
         <div>
            <div>
               <?php $startuplink = str_replace(' ', '+', $startupimages[$i]->startupname);?>
               <div style="display: flex;" class="left-side-two-image">
                  <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                     <img src="{{url('startup/'.$startupimages[$i]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                  </a>
               </div>
               @if(isset($startupimages[$i+1]))
                  <?php $startuplink = str_replace(' ', '+', $startupimages[$i+1]->startupname);?>
                  <div style="display: flex;" class="left-side-two-image">
                     <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                        <img src="{{url('startup/'.$startupimages[$i+1]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                     </a>
                  </div>
               @endif
            </div>
         </div>
         {{-- Right side one big Image --}}
         @if(isset($startupimages[$i+2]))
            <?php $startuplink = str_replace(' ', '+', $startupimages[$i+2]->startupname);?>
            <div class="right-side-big-image">
               <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                  <img src="{{url('startup/'.$startupimages[$i+2]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-big-image-alter" loading="lazy">
               </a>
            </div>
         @endif
      </div>
      {{-- Six images --}}
      <div style="display: flex;  flex-wrap: wrap;">
         <div style="display: flex; width:100%; justify-content: center;">
            @if(isset($startupimages[$i+3]))
               <?php $startuplink = str_replace(' ', '+', $startupimages[$i+3]->startupname);?>
               <div class="single-row-image">
                  <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                     <img src="{{url('startup/'.$startupimages[$i+3]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                  </a>
               </div>
            @endif
            @if(isset($startupimages[$i+4]))
               <?php $startuplink = str_replace(' ', '+', $startupimages[$i+4]->startupname);?>
               <div class="single-row-image">
                  <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                     <img src="{{url('startup/'.$startupimages[$i+4]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                  </a>
               </div>
            @endif
            @if(isset($startupimages[$i+5]))
               <?php $startuplink = str_replace(' ', '+', $startupimages[$i+5]->startupname);?>
               <div class="single-row-image">
                  <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                     <img src="{{url('startup/'.$startupimages[$i+5]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                  </a>
               </div>
            @endif
         </div>
         <div style="display: flex; width:100%; justify-content: center;">
            @if(isset($startupimages[$i+6]))
               <?php $startuplink = str_replace(' ', '+', $startupimages[$i+6]->startupname);?>
               <div class="single-row-image">
                  <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                     <img src="{{url('startup/'.$startupimages[$i+6]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                  </a>
               </div>
            @endif
            @if(isset($startupimages[$i+7]))
               <?php $startuplink = str_replace(' ', '+', $startupimages[$i+7]->startupname);?>
               <div class="single-row-image">
                  <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                     <img src="{{url('startup/'.$startupimages[$i+7]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                  </a>
               </div>
            @endif
            @if(isset($startupimages[$i+8]))
               <?php $startuplink = str_replace(' ', '+', $startupimages[$i+8]->startupname);?>
               <div class="single-row-image">
                  <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                     <img src="{{url('startup/'.$startupimages[$i+8]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                  </a>
               </div>
            @endif
         </div>
      </div>
      {{-- Right side one big Image --}}
      <div style="display: flex; justify-content: center;">
         @if(isset($startupimages[$i+9]))
            <?php $startuplink = str_replace(' ', '+', $startupimages[$i+9]->startupname);?>
            <div class="right-side-big-image">
               <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                  <img src="{{url('startup/'.$startupimages[$i+9]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-big-image-alter" loading="lazy">
               </a>
            </div>
         @endif
         {{-- Left side two Images --}}
         <div>
            <div>
               @if(isset($startupimages[$i+10]))
                  <?php $startuplink = str_replace(' ', '+', $startupimages[$i+10]->startupname);?>
                  <div style="display: flex;" class="left-side-two-image">
                     <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                        <img src="{{url('startup/'.$startupimages[$i+10]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                     </a>
                  </div>
               @endif
               @if(isset($startupimages[$i+11]))
                  <?php $startuplink = str_replace(' ', '+', $startupimages[$i+11]->startupname);?>
                  <div style="display: flex;" class="left-side-two-image">
                     <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                        <img src="{{url('startup/'.$startupimages[$i+11]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
                     </a>
                  </div>
               @endif
            </div>
         </div>
      </div>
      <div style="display: flex; width:100%; justify-content: center;">
         @if(isset($startupimages[$i+12]))
            <?php $startuplink = str_replace(' ', '+', $startupimages[$i+12]->startupname);?>
            <div class="single-row-image">
               <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                  <img src="{{url('startup/'.$startupimages[$i+12]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
               </a>
            </div>
         @endif
         @if(isset($startupimages[$i+13]))
            <?php $startuplink = str_replace(' ', '+', $startupimages[$i+13]->startupname);?>
            <div class="single-row-image">
               <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                  <img src="{{url('startup/'.$startupimages[$i+13]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
               </a>
            </div>
         @endif
         @if(isset($startupimages[$i+14]))
            <?php $startuplink = str_replace(' ', '+', $startupimages[$i+14]->startupname);?>
            <div class="single-row-image">
               <a href="{{url('startup/search/'.$startuplink)}}" class="search-image-anchor">
                  <img src="{{url('startup/'.$startupimages[$i+14]->startupmainphoto)}}" alt="Startup image" class="img-fluid search-image-alter" loading="lazy">
               </a>
            </div>
         @endif
      </div>
   </div>
   <?php $i = $i + 15;?>
@endfor