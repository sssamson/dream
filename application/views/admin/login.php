<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card-group mb-0">
      <div class="card p-4 login_div">
        <div class="card-body">
          <form id="login_form" method="post" novalidate="novalidate" class="fv-form fv-form-bootstrap">
            <h1>Login</h1>
            <p id="session_error" class="log-error">Session has Expired</p>
            <p id="login_error" class="log-error">Invalid Email and/or Password</p>
            <p class="text-muted">Sign In</p>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-user"></i></span>
              <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control"
                    placeholder="Email">
            </div>
            <div class="input-group mb-4">
              <span class="input-group-addon"><i class="icon-lock"></i></span>
              <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="Password">
            </div>
            <div class="row">
              <div class="col-6">
                <button
                    id="login_sign_up"
                    type="submit"
                    class="btn btn-primary px-4">Login</button>
              </div>
              <div class="col-6 text-right">
                <button type="button" class="btn btn-link px-0">Forgot password?</button>
              </div>
            </div>
            <input type="hidden" name="mode" value="login">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
