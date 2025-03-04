<footer>
    <hr style="margin-bottom: 0;">
    @include( 'partials/navbar' )
    <div class="footer bg-main some-padding">
        <div class="container">
            <div class="d-md-flex d-block text-center flex-wrap justify-content-md-end justify-content-center bd-highlight">
                <span class="d-none d-md-block nav-linke align-self-start mr-0 mr-md-auto pt-2 mt-1" style="color: #DAD9D8;">
                    &copy; {{ date( 'Y' ) }} secretdesire.co
                </span>
                <a class="nav-linke" href="{{ route( 'page_termsOfService' ) }}">
                    Terms of service
                </a>
                <a class="nav-linke"  href="{{ route( 'page_privacyPolicy' ) }}">
                    Privacy Policy
                </a>
                <span class="d-md-none nav-linke align-self-start mr-0 mr-md-auto pt-2 mt-1" style="color: #DAD9D8;">
                    &copy; {{ date( 'Y' ) }} secretdesire.co
                </span>
            </div>  
        </div>
    </div>
</footer>

</div>

<!-- Modal -->
<div class="modal fade " id="reportClientFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <h3 class="forgot-title">Report</h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="alert text-center alert-success" role="alert" id="bumpSucc">
                    <p>Thank you!</p>
                    <p>
                        Your complain will be sent to moderation team immediately!
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade " id="reviewClientFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <h3 class="forgot-title">Review</h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="alert text-center alert-success" role="alert" id="bumpSucc">
                    <p>Thank you!</p>
                    <p>
                        Your review will be posted after moderation!
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="regist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Log in</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Sign up</a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">


                        <form action="{{ route('register') }}" method="POST" id="form_newUser">
                            <div id="regUnswer"></div>
                            <div class="alert alert-danger print-error-msg" style="display:none">

                                <ul></ul>
                            </div>
                            <div class="input-box">
                                <input type="text" class="input-disabled" name="name" minlength="4"
                                       placeholder="Username" required id="registerName">
                            </div>
                            <div class="input-box password">
                                <img src="{{asset('img/icon/Eye.svg')}} " class="showPass" id="eye" alt="icon">
                                <input type="password" class="input-disabled inputPassword" id="password-input"
                                       name="password" minlength="8" placeholder="Password" required>
                            </div>
                            <div class="input-box password">
                                <img src="{{asset('img/icon/Eye.svg')}} "  class="showPass" id="eye2" alt="icon">
                                <input type="password" class="input-disabled inputPassword" id="password-input2"
                                       name="password_confirmation" minlength="8" placeholder="Confirm Password" required>
                            </div>
                            <div class="input-box">
                                <input type="email" class="input-disabled" name="email" minlength="3"
                                       placeholder="Email" required>
                            </div>
                            <div class="input-box-check">
                                <p>I am </p>
                                <div>
                                    <label>
                                        <input class="checkbox" type="radio" value="provider"
                                               name="userType">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">Provider</span>
                                    </label>
                                    <label>
                                        <input class="checkbox" type="radio" value="client"
                                               name="userType">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">Client</span>
                                    </label>
                                </div>
                            </div>
                            <div class="button-send-wrap">
                                <button type="submit">Sing Up</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show active " id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <br>
                        <form action="{{ route('login') }}" method="POST" id="formLogin">
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <div class="input-box">
                                <input type="text" class="input-disabled" class="inputPassword"  name="email"
                                       placeholder="Email" minlength="3" required>
                            </div>
                            <div class="input-box password">
                                <img src="{{asset('img/icon/Eye.svg')}}" class="showPass" alt="icon">
                                <input type="password" class="input-disabled inputPassword"  name="password"
                                       placeholder="Password" minlength="6" required>
                            </div>
{{--                            <a href="{{ route('password.request') }}" data-toggle="modal" data-target="#forgot" class="forgot">--}}
                            <a href="{{ route('password.request') }}"  class="forgot">
                                Forgot password?</a>
                            <div class="button-send-wrap">
                                <button type="submit">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="acceptBumps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <h3 class="forgot-title">Are you sure?</h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    After your agreement you will be charged and bumps will appear in Section "Bumps"
                </div>
                <br>
                <form action="" method="POST" class="formBumps_2">
                    <input type="hidden" name="money">
                    <input type="hidden" name="bumps">
                    <div style="display: flex;     justify-content: space-evenly;">

                        <div class="button-send-wrap">
                            <button class="accept__btn" type="submit" value="true">Agree</button>
                        </div>
                        <div class="button-send-wrap">
                            <button class="accept__btn" type="submit" value="false">Disagree</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade userComplaint" id="userComplaint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <div class="forgot-title-box">
                    <h3 class="forgot-title">User complain</h3>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <br>
                <form  id="modalDescribe" action="/" method="POST" class="reportAdd">
                    <input type="hidden" id="inputUserTarget" name="comment_for_user_id" value="">
                    <p class="forgot-text" id="Describereasocomplain">
                        Describe the reason of complain
                    </p>
                    <div class="alert alert-success" role="alert" id="sentformoderation" style="display: none">
                        Thank you!
                        Your complain will be sent to moderation team immediately!
                    </div>

                    <div class="input-box">
                        <input type="text" name="text" class="input-disabled" placeholder="User complain"
                               minlength="3" required>
                    </div>
                    <div class="button-send-wrap"  >
                        <button type="submit"  id="addComplain" data-id="" >Complain</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <h3 class="forgot-title">Welcome to Secret Desire</h3>
                </div>
            </div>
            <div class="modal-body">
                <br>
                <form action="" method="POST">
                    <p class="forgot-text">Please enter your Email so we can send you an email to reset your
                        password</p>
                    <div class="input-box">
                        <input type="email" name="userEmailFog" class="input-disabled" placeholder="Email"
                               minlength="3" required>
                    </div>
                    <div class="button-send-wrap">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="infoModal--photo" tabindex="-1" role="dialog" aria-labelledby="ageModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <h3 class="forgot-title">Info</h3>
                </div>
            </div>
            <div class="modal-body">
                <br>
                <p class="forgot-text" >Please add a photo!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary theme-btn--customBootstrap" data-dismiss="modal"  >Ok</button>
            </div>
        </div>
    </div>
</div>


@if(!Auth::user())
<div class="modal fade" id="ageModal" tabindex="-1" role="dialog" aria-labelledby="ageModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <h3 class="forgot-title">Welcome to Secret Desire</h3>
                </div>
            </div>
            <div class="modal-body">
                <br>
                    <p class="forgot-text">This website contains nudity, sexual content and adult language. It should be accessed only by people who are of legal age in the physical location from where you are accessing the site.</p>
                <p class="forgot-text">    By clicking "I Agree", you are representing to us that you are of legal age and agree to our Terms.</p>
                <p class="forgot-text">    While Secret Desire does not create any content in the listings on the site, all the listings must comply with our age and content standards.</p>
                <p class="forgot-text">    We will not allow any links to child pornography or minors on this site. You agree to report violations of this policy immediately. You also agree that by clicking enter below, you have taken precautions to prevent persons that are not of legal age to view this site from using your computer. If you come across any suspected exploitation of minors and/or human trafficking please report to the appropriate authorities.</p>


            </div>
            <div class="modal-footer">
                <a href="https://google.com/"  class="btn btn-secondary" >I Don't Agree</a>
                <button type="button" class="btn btn-primary theme-btn--customBootstrap" data-dismiss="modal"  >I Agree</button>
            </div>
        </div>
    </div>
</div>
@endif


<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" defer>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript" defer></script>
<script src="{{asset('js/bootstrap.min.js')}}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js" defer></script>
<script src="{{asset('js/intlTelInput.js')}}"       defer></script>
<script src="{{asset('js/calcMoneyNewModel.js')}}"  defer></script>
<script src="{{asset('js/bumps.js')}}"              defer></script>
<script src="{{asset('js/fileInput.js')}}"          defer></script>
<script src="{{asset('js/locales/LANG.js')}}"       defer></script>
<script src="{{asset('js/myjs.js')}}"               defer></script>

@if(Auth::User())
    <script src="//code.jivosite.com/widget.js" data-jv-id="xxbUHd1dK6" async></script>
@endif

<script>

    // This works has largely been adapted from Eric Bidelman https://github.com/ebidel
    // From the article Reading file in Javascript using the File APIs http://www.html5rocks.com/en/tutorials/file/dndfiles/#toc-reading-files
    // Under a Creative Commons Attribution 3.0 licence http://creativecommons.org/licenses/by/3.0/
    (function($) {
        var options;

        $.fn.filePreview = function(user_options) {
            var defaults = {
                previewElement: $(this).attr('id') + '_preview'
            };
            options = $.extend({}, defaults, user_options);

            if(document.getElementById($(this).attr('id'))){
                document.getElementById($(this).attr('id')).addEventListener('change', handleFileSelect, false);
            }
        }

        function handleFileSelect(evt) {

            var files = evt.target.files; // FileList object

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Render thumbnail.
                        var span = document.createElement('span');
                        $(span).addClass('img__container');
                        span.innerHTML = ['<p class="delete__button"></p><img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
                        document.getElementById(options.previewElement).insertBefore(span, null);
                    };
                })(f);

                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
            }
        }

    })(jQuery);

    $(document).ready(function(){

       // $("#file_field").filePreview();

    });


</script>


</body>

</html>
