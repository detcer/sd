
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
                <form id="modalDescribe" action="/" method="POST" class="reportAdd">
                    <p class="forgot-text" id="Describereasocomplain">
                        Describe the reason of complain
                    </p>
                    <div class="alert alert-success" role="alert" id="sentformoderation" style="display: none">
                        Thank you!
                        Your complain will be sent to moderation team immediately!
                    </div>

                    <div class="input-box">
                        <input type="text" name="text" class="input-disabled" placeholder="User complain" minlength="3" required>
                    </div>
                    <div class="button-send-wrap">
                        <button type="button" id="addComplain" data-id="" >Complain</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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

