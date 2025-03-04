<!-- 
<div class="modal fade" id="agreementModal" tabindex="-1" role="dialog" aria-labelledby="ageModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <h3 class="forgot-title">Welcome to Secret Desire</h3>
                </div>
            </div>
            <div class="modal-body">
                    <p class="forgot-text">This website contains nudity, sexual content and adult language. It should be accessed only by people who are of legal age in the physical location from where you are accessing the site.</p>
                <p class="forgot-text">    By clicking "I Agree", you are representing to us that you are of legal age and agree to our Terms.</p>
                <p class="forgot-text">    While Secret Desire does not create any content in the listings on the site, all the listings must comply with our age and content standards.</p>
                <p class="forgot-text">    We will not allow any links to child pornography or minors on this site. You agree to report violations of this policy immediately. You also agree that by clicking enter below, you have taken precautions to prevent persons that are not of legal age to view this site from using your computer. If you come across any suspected exploitation of minors and/or human trafficking please report to the appropriate authorities.</p>


            </div>
            <div class="modal-footer">
                <a rel="nofollow" href="https://google.com/"  class="btn btn-secondary btn-main" style="background-color: #5a6268;" >I Don't Agree</a>
                <button type="button" class="btn btn-main" data-agreeing data-dismiss="modal">I Agree</button>
            </div>
        </div>
    </div>
</div> -->

<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$bots_to_hide = array(
    'Googlebot',
    'Google-InspectionTool',
    'GoogleOther',
    'Googlebot-Image'
);

$hide_content = false;

foreach ($bots_to_hide as $bot) {
    if (strpos($user_agent, $bot) !== false) {
        $hide_content = true;
        break;
    }
}

if ($hide_content) {
    // For the specified bots, serve different content or return nothing
    // For example:
    // header('HTTP/1.1 404 Not Found');
    exit();
    // exit("This content is not available for the specified bots.");
} else {
    // For regular users and other bots, display the content
    echo '<div class="modal fade" id="agreementModal" tabindex="-1" role="dialog" aria-labelledby="ageModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="forgot-title-box">
                    <p class="forgot-title">Welcome to Secret Desire</p>
                </div>
            </div>
            <div class="modal-body">
                    <p class="forgot-text">This website contains nudity, sexual content and adult language. It should be accessed only by people who are of legal age in the physical location from where you are accessing the site.</p>
                <p class="forgot-text">    By clicking "I Agree", you are representing to us that you are of legal age and agree to our Terms.</p>
                <p class="forgot-text">    While Secret Desire does not create any content in the listings on the site, all the listings must comply with our age and content standards.</p>
                <p class="forgot-text">    We will not allow any links to child pornography or minors on this site. You agree to report violations of this policy immediately. You also agree that by clicking enter below, you have taken precautions to prevent persons that are not of legal age to view this site from using your computer. If you come across any suspected exploitation of minors and/or human trafficking please report to the appropriate authorities.</p>


            </div>
            <div class="modal-footer">
                <a rel="nofollow" href="https://google.com/"  class="btn btn-secondary btn-main" style="background-color: #5a6268;" >I Don\'t Agree</a>
                <button type="button" class="btn btn-main" data-agreeing data-dismiss="modal">I Agree</button>
            </div>
        </div>
    </div>
</div>';
}
?>
