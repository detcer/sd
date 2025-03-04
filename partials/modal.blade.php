<div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-3">
        <p class="text-white">
          Welcome to Secret Desire
        </p>
      </div>
      <div class="modal-body">
        <p class='guest-text'>
          This website contains nudity, sexual content and adult language. It should be accessed only by people who are of legal age in the physical location from where you are accessing the site.
        </p>
        <p class='guest-text'>
          By clicking "I Agree", you are representing to us that you are of legal age and agree to our Terms.          
        </p>
        <p class='guest-text'>
          While Secret Desire does not create any content in the listings on the site, all the listings must comply with our age and content standards.        
        </p>
        <p class='guest-text'>
          We will not allow any links to child pornography or minors on this site. You agree to report violations of this policy immediately. You also agree that by clicking enter below, you have taken precautions to prevent persons that are not of legal age to view this site from using your computer. If you come across any suspected exploitation of minors and/or human trafficking please report to the appropriate authorities.     
        </p>
        <div class="d-flex justify-content-md-end flex-wrap mt-4 mb-3">
          <button class="btn btn-flat mr-2">I Don't Agree</button>
          <button class="btn btn-main">I Agree</button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header pb-0 pt-3">
        <ul class="nav nav-tabs">
          <li class=" nav-item">
            <a class="nav-heading nav-link active" data-toggle='tab' href="#home">Log in</a>
          </li>
          <li class=" nav-item">
            <a class="nav-heading nav-link" data-toggle='tab' href="#menu1">Sign up</a>
          </li>
        </ul>
      </div>
      <div class="modal-body">
        <div class="tab-content">
          <div id="home" class="container tab-pane active">
            




            <form class="form" method="POST" action="{{ route( 'login' ) }}" id="login-form">
              <div class="alert alert-danger print-error-msg" style="display:none"></div>
              <div class="form-group">
                <input autofocus="" placeholder="Email" class="main-input form-control" type="email" required="" name="email" />
              </div>
              <div class="password form-group">
                <img class="showPass" alt="Show password" src="/img/icon/Eye.svg" />
                <input placeholder="Password" type="password" class="inputPass main-input form-control" required="" name="password" />
              </div>
              <a href="https://secretdesire.co/password/reset" class="forgot">
                Forgot password?
              </a>
              <div class="form-group">
                <button class="btn mx-auto d-flex btn-main" type="submit">Log in</button>
              </div>
            </form>





          </div>
          <div id="menu1" class="container tab-pane fade">



            <form class="form" method="POST" action="{{ route( 'register' ) }}" id="register-form">
              <div class="alert alert-danger print-error-msg" style="display:none"></div>
              <div class="form-group">
                <input autofocus="" placeholder="Username" class="main-input form-control" type="text" required="" name="name" minlength="4" />
              </div>
              <div class="password form-group">
                <img class="showPass" alt="Show password" src="/img/icon/Eye.svg" />
                <input placeholder="Password" type="password" class="inputPass main-input form-control" required="" name="password" />
              </div>
              <div class="password form-group">
                <img class="showPass" alt="Show password" src="/img/icon/Eye.svg" />
                <input placeholder="Confirm password" type="password" class="inputPass main-input form-control" required="" name="password_confirmation" />
              </div>
              <div class="form-group">
                <input autofocus="" placeholder="Email" class="main-input form-control" type="email" required="" name="email" />
              </div>
              <div class="input-box-check">
                <p style="font-size: 1rem">I am </p>
                <div>
                  <label for="userTypeProvider">
                    <input class="checkbox" type="radio" value="provider" name="userType" id="userTypeProvider">
                    <span class="checkbox-custom"></span>
                    <span class="label">Provider</span>
                  </label>
                  <label for="userTypeClient">
                    <input class="checkbox" type="radio" value="client" name="userType" id="userTypeClient">
                    <span class="checkbox-custom"></span>
                    <span class="label">Client</span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <button class="btn mx-auto d-flex btn-main" type="submit">Sign up</button>
              </div>
            </form>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
