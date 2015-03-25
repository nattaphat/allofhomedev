<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            Login
          </h4>
        </div>
        <div class="modal-body">
          <form action="login.htm" role="form">
            <div class="form-group">
              <label class="sr-only" for="login-email">Email</label>
              <input type="email" id="login-email" class="form-control email" placeholder="Email">
            </div>
            <div class="form-group">
              <label class="sr-only" for="login-password">Password</label>
              <input type="password" id="login-password" class="form-control password" placeholder="Password">
            </div>
            <button type="button" class="btn btn-primary">Login</button>
          </form>
        </div>
        <div class="modal-footer">
            <form class="form-inline text-center">
                <div class="form-group">
                <!--@todo: replace with company social media details-->
                    <a class="btn btn-block btn-social btn-twitter">
                        <i class="fa fa-twitter"></i> Twitter
                    </a>
                </div>
                <div class="form-group">
                    <a class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                </div>
            </form>
        </div>

        <div class="modal-footer">
          <small>Not a member? <a href="#" class="signup">Sign up now!</a></small>
          <br />
          <small><a href="#">Forgotten password?</a></small>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>