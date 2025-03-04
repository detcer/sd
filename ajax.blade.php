<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Validation Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<div class="container">
    <h2>Laravel Ajax Validation</h2>


    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <form action="/login" method="POST" id="form_newUser">
        <div class="input-box">
            <input type="text" class="input-disabled" name="name" minlength="4"
                   placeholder="Username" required>
        </div>
        <div class="input-box password">
            <img src="img/icon/Eye.svg" id="eye" alt="icon">
            <input type="password" class="input-disabled" id="password-input"
                   name="password" minlength="6" placeholder="password" required>
        </div>
        <div class="input-box password">
            <img src="img/icon/Eye.svg" id="eye2" alt="icon">
            <input type="password" class="input-disabled" id="password-input2"
                   name="password_confirmation" minlength="6" placeholder="Confirm Password" required>
        </div>
        <div class="input-box">
            <input type="email" class="input-disabled" name="email" minlength="3"
                   placeholder="Lorem2309@gmail.com" required>
        </div>
        <div class="input-box-check">
            <p>I am not</p>
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


<script type="text/javascript">


    $(document).ready(function() {

        $('#form_newUser').on('submit', function(e){
            var form_data = $(this).serializeArray();
            e.preventDefault();
            $.ajax({
                url: '/my-form',
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });

        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>


</body>
</html>
