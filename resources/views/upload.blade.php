<!--Image Crop Modal-->
<div id="myModal" class="custom-modal">
    <div class="custom-modal-content-css container-fluid col-md-6">
        <div class="custom-modal-header">
            <span class="close">&times;</span>
        </div>
        <div class="custom-modal-body">
            <img src="" id="image">
        </div>
        <form id="myAwesomeForm">
            <input type="hidden" id="filename" name="filename" /> <!-- Filename -->
        </form>
        <div class="custom-modal-footer">
            <div class="custom-modal-footer-button">
                <button type="button" class="btn btn-light" class="close" onclick="closeModel()">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="crop()">Crop & Post</button>
            </div>
        </div>
    </div>
</div>
<!--Image Crop Modal-->

 <!--Image Size Warning Modal -->
 <div class="modal fade" id="imagewarning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-image-size">
                    Image size must less than 2MB
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Image Size Warning Modal --> 

<!--Image Uploading Wait Modal-->
<div class="modal fade" id="image-cropping" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p><img src="{{asset('web-images/image-cropping.gif')}}" /></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Image Uploading Wait Modal-->