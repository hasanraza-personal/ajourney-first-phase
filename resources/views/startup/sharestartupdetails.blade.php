<!--Share Modal-->

<div class="modal fade" id="sharestartupdetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Share</h5>

                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="share-button text-center" style="display: flex; justify-content:space-around;">

                    {{--Facebook share--}}

                    <div class="facebook-share-button">

                        <a class="btn btn-primary btn-lg btn-floating" id="link" style="background-color: #055592;" onclick="facebookShare()" 

                        target="_blank" role="button">

                            <i class="fab fa-facebook"></i>

                        </a>

                    </div>

                    {{--Twitter share--}}

                    <div class="twitter-share-button">

                        <a class="btn btn-primary btn-lg btn-floating" style="background-color: #55acee;" id="twitterlink" onclick="twitterShare()"

                        target="_blank" role="button">

                            <i class="fab fa-twitter me-2"></i>

                        </a>

                    </div>

                    {{--Whatsapp share--}}

                    <div class="whatsapp-share-button">

                        <a class="btn btn-primary btn-lg btn-floating" style="background-color: #2bac31;" id="whatsapplink" onclick="whatsappShare()"

                        target="_blank" role="button">

                            <i class="fab fa-whatsapp" style="color:#fff;"></i>

                        </a>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary cls-btn" data-mdb-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>

<!--Share Modal-->