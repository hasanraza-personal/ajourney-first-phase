<!--Share Modal-->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Share</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="share-button text-center">
                    {{--Facebook share--}}
                    <div class="facebook-share-button">
                        <a class="btn btn-primary btn-lg btn-floating" id="link" style="background-color: #055592;" 
                        href="https://www.facebook.com/sharer.php?u=https://ajourney.in" target="_blank" role="button">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                    {{--Twitter share--}}
                    <div class="twitter-share-button">
                        <a class="btn btn-primary btn-lg btn-floating" style="background-color: #55acee;" 
                        href="http://twitter.com/share?text=Done with the exams? Take a break and have memes. Already had enough memes? We gotchu, Checkout the Newly formed Indian Startups. Only at MemeSpace, a virtual world never seen before.&url=https://ajourney.in&hastags=meme" target="_blank" role="button">
                            <i class="fab fa-twitter me-2"></i>
                        </a>
                    </div>
                    {{--Whatsapp share--}}
                    <div class="whatsapp-share-button">
                        <a class="btn btn-primary btn-lg btn-floating" style="background-color: #2bac31;" 
                        href="https://api.whatsapp.com/send?phone=&text={{urlencode('Done with the exams? Take a break and have memes. Already had enough memes? We gotchu, Checkout the Newly formed Indian Startups. Only at MemeSpace - A virtual world never seen before.')}} https://ajourney.in&hastags=meme" target="_blank" role="button">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Share Modal-->