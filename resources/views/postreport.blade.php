<!-- Post Report Modal -->
<div class="modal fade" id="postreport" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report post</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-report-post-option">
                    <input type="hidden" id="postsrno" value="">
                    <input type="hidden" id="postusername" value="">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect2">
                            <option>Inapporopriate or offensive</option>
                            <option>Copyright breach</option>
                            <option>Repost</option>
                            <option>Not funny</option>
                            <option>Other</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea" rows="2" placeholder="Comments (optional)"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal" onclick="submitReport()">Report</button>
            </div>
        </div>
    </div>
</div>
<!--Post Report Modal-->  

<!-- Post Report Submitted Modal -->
<div class="modal fade" id="reportsubmitted" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-successfull-delete">
                    Your Report has been submitted
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Post Report Submitted Modal-->  