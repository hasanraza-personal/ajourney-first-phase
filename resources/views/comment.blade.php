<!--Static Comment Modal-->
<div class="modal fade" id="staticBackdrop1" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content height-modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Comment</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="comment-data">
            
            </div>
            <div class="no-more-comment text-center" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%) "></div>
            <div class="comment-load text-center" style="display:none">
                <p><img src="{{asset('../images/loader.gif')}}" /></p>
            </div>
            <div class="modal-footer">
                <form method="post" action="commentpost" id="usercommentpost" onsubmit="return commentForm();">
                    @csrf
                    <div class="form-group comment_box">
                        <div class="comment_profilephoto">
                            <img src="{{ session('session_profilephoto') }}" class="rounded-circle" height="30" alt="" loading="lazy" />
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="write your comment as {{ session('session_username') }}"></textarea>
                    </div>
                    <div class="comment_error"></div>
                    <div class="comment_button">
                        <button type="button" class="btn btn-link" data-mdb-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><b>Comment</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Static Comment Modal-->