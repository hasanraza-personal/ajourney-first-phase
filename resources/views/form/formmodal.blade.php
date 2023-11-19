<!-- Link Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Click to add Link</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Facebook -->
                <div class="links" id="facebook">
                    <a class="btn btn-primary" style="background-color: #3b5998;" href="javascript:void(0)" role="button" onclick="addLink('facebook')">
                        <i class="fab fa-facebook-f"></i>
                        <span class="exta-form-link">Add facebook link</span>
                    </a>
                </div>
                <div class="links" id="twitter">
                    <!-- Twitter -->
                    <a class="btn btn-primary" style="background-color: #55acee;" href="javascript:void(0)" role="button" onclick="addLink('twitter')">
                        <i class="fab fa-twitter "></i>
                        <span class="exta-form-link">Add Twitter link</span>
                    </a>
                </div>
                <div class="links" id="linkedin">
                    <!-- Linkedin -->
                    <a class="btn btn-primary" style="background-color: #0082ca;" href="javascript:void(0)" role="button" onclick="addLink('linkedin')">
                        <i class="fab fa-linkedin-in"></i>
                        <span class="exta-form-link">Add Linkedin link</span>
                    </a>
                </div>
                <div class="links" id="youtube">
                    <!-- Youtube -->
                    <a class="btn btn-primary" style="background-color: #FF0000;" href="javascript:void(0)" role="button" onclick="addLink('youtube')">
                        <i class="fab fa-youtube"></i>
                        <span class="exta-form-link">Add Youtube link</span>
                    </a>
                </div>
                <div class="links" id="flipcart">
                    <!-- Flipcart -->
                    <a class="btn btn-primary" style="background-color: #f7a200;" href="javascript:void(0)" role="button" onclick="addLink('flipcart')">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="exta-form-link">Add Flipcart link</span>
                    </a>
                </div>
                <div class="links" id="amazon">
                    <!-- Amazon -->
                    <a class="btn btn-primary" style="background-color: #000000;" href="javascript:void(0)" role="button" onclick="addLink('amazon')">
                        <i class="fab fa-amazon"></i>
                        <span class="exta-form-link">Add Amazon link</span>
                    </a>
                </div>
                <div class="links" id="swiggy">
                    <!-- Swiggy -->
                    <a class="btn btn-primary" style="background-color: #FC8019;" href="javascript:void(0)" role="button" onclick="addLink('swiggy')">
                        <i class="fas fa-pizza-slice"></i>
                        <span class="exta-form-link">Add Swiggy link</span>
                    </a>
                </div>
                <div class="links" id="zomato">
                    <!-- Zomato -->
                    <a class="btn btn-primary" style="background-color: #cb202d;" href="javascript:void(0)" role="button" onclick="addLink('zomato')">
                        <i class="fas fa-pizza-slice"></i>
                        <span class="exta-form-link">Add Zomato link</span>
                    </a>
                </div>
                <div class="links" id="magicpin">
                    <!-- Magicpin -->
                    <a class="btn btn-primary" style="background-color: #ef1c71;" href="javascript:void(0)" role="button" onclick="addLink('magicpin')">
                        <i class="fas fa-thumbtack"></i>
                        <span class="exta-form-link">Add Magicpin link</span>
                    </a>
                </div>
                <div class="links" id="map">
                    <!-- Map -->
                    <a class="btn btn-primary" style="background-color: #1ea362;" href="javascript:void(0)" role="button" onclick="addLink('map')">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="exta-form-link">Add Map link</span>
                    </a>
                </div>
                <div class="links" id="other">
                    <!-- Other -->
                    <a class="btn btn-light" style="background-color: #e5f0ea;" href="javascript:void(0)" role="button" onclick="addLink('other')">
                        <span class="exta-form-link">Other link</span>
                    </a>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                  Close
                </button>
            </div> --}}
        </div>
    </div>
</div>

<!-- Link Modal -->
{{-- <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Didn't find your Link</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                    <label class="form-label" for="textAreaExample">Enter the link that you want</label>
                </div>
                <div id="textAreaExample" class="form-text">
                    We'll never share your email with anyone else.
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="registerLink()">Submit</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Link Modal -->

<!-- Empty Modal -->
<div class="modal fade" id="emptyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-modify">
                <h5 class="modal-title" id="exampleModalLabel">Field is empty!</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="empty-warning">
                    Please fill all the required fields.
                </div>
            </div>
            <div class="modal-footer modal-footer-modify">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Empty Modal -->

<!-- Submit Modal -->
<div class="modal fade" id="submitconfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="register-warning">
                    Please make sure that all the details are correct. We will soon contact you.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="registerStartup()">Register Startup</button>
            </div>
        </div>
    </div>
</div>
<!-- Submit Modal -->

<!--Share Modal-->
<div class="modal fade" id="sharestartupformModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0;">
                <div class="modal-title" id="exampleModalLabel">Share</div>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="share-button text-center" style="display: flex; justify-content:space-around;">
                    {{--Facebook share--}}
                    <div class="facebook-share-button">
                        <a class="btn btn-primary btn-lg btn-floating" id="link" style="background-color: #055592;" 
                        href="https://www.facebook.com/sharer.php?u=https://ajourney.in/form/startup/filldetails" target="_blank" role="button">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                    {{--Twitter share--}}
                    <div class="twitter-share-button">
                        <a class="btn btn-primary btn-lg btn-floating" style="background-color: #55acee;" 
                        href="http://twitter.com/share?text=Hey, here you can register your Startup at Ajourney by clicking the below link&url=https://ajourney.in/form/startup/filldetails&hastags=startup" target="_blank" role="button">
                            <i class="fab fa-twitter me-2"></i>
                        </a>
                    </div>
                    {{--Whatsapp share--}}
                    <div class="whatsapp-share-button">
                        <a class="btn btn-primary btn-lg btn-floating" style="background-color: #2bac31;" 
                        href="https://api.whatsapp.com/send?phone=&text={{urlencode('Hey, here you can register your Startup at Ajourney by clicking the below link')}} https://ajourney.in/form/startup/filldetails" target="_blank" role="button">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-secondary cls-btn" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Share Modal-->

<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="feedbackemail" class="form-text">
                    Required*
                </div>
                <div class="form-outline">
                    <input type="email" id="feedbackemailaddress" class="form-control" aria-describedby="textExample1" required/>
                    <label class="form-label" for="feedbackemailaddress">Email</label>
                </div>
                <div id="textExample1" class="form-text modal-form-text">
                  We'll never share your email with anyone else.
                </div>
                <div id="feedbackfield" class="form-text">
                    Required*
                </div>
                <div class="form-outline">
                    <textarea class="form-control" id="feedbackarea" rows="4" required></textarea>
                    <label class="form-label" for="feedbackarea">Please share your feedback</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="submitFeedback()">Submit Feedback</button>
            </div>
        </div>
    </div>
</div>
<!-- Feedback Modal -->

<!-- Feedback Submitted -->
<div class="modal fade" id="feedbacksubmittedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-modify">
                <h5 class="modal-title" id="exampleModalLabel">Feedback submitted</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="empty-warning">
                    Thank you for your feedback
                </div>
            </div>
            <div class="modal-footer modal-footer-modify">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Feedback Submitted -->

<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-modify">
                <h5 class="modal-title" id="exampleModalLabel">Incorrect Email</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="empty-warning">
                    Please provide a valid email address
                </div>
            </div>
            <div class="modal-footer modal-footer-modify">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Email Modal -->

<!-- Number Modal -->
<div class="modal fade" id="numberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-modify">
                <h5 class="modal-title" id="exampleModalLabel">Incorrect Contact no</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="empty-warning">
                    Please provide Contact no in digits
                </div>
            </div>
            <div class="modal-footer modal-footer-modify">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Number Modal -->

<!-- Verification Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verification</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-outline">
                    <input type="password" id="password" class="form-control" aria-describedby="textExample1" required/>
                    <label class="form-label" for="feedbackemailaddress">Password</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="showpassword"/>
                    <label class="form-check-label" for="flexCheckDefault">
                      Show Password
                    </label>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="submitPassword()">Submit Password</button>
            </div>
        </div>
    </div>
</div>
<!-- Verification Modal -->
