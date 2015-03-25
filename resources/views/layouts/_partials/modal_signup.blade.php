<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            Sign Up
          </h4>
        </div>
        <div class="modal-body">
          <form action="signup.htm" role="form">
            <h5>
              Price Plan
            </h5>
            <select class="form-control">
              <option>Basic</option>
              <option>Pro</option>
              <option>Pro +</option>
            </select>
            
            <h5>
              Account Information
            </h5>
            <div class="form-group">
              <label class="sr-only" for="signup-first-name">First Name</label>
              <input type="text" class="form-control" id="signup-first-name" placeholder="First name">
            </div>
            <div class="form-group">
              <label class="sr-only" for="signup-last-name">Last Name</label>
              <input type="text" class="form-control" id="signup-last-name" placeholder="Last name">
            </div>
            <div class="form-group">
              <label class="sr-only" for="signup-username">Userame</label>
              <input type="text" class="form-control" id="signup-username" placeholder="Username">
            </div>
            <div class="form-group">
              <label class="sr-only" for="signup-email">Email address</label>
              <input type="email" class="form-control" id="signup-email" placeholder="Email address">
            </div>
            <div class="form-group">
              <label class="sr-only" for="signup-password">Password</label>
              <input type="password" class="form-control" id="signup-password" placeholder="Password">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="term">
                I agree with the Terms and Conditions. 
              </label>
            </div>
            <button class="btn btn-primary" type="submit">Sign up</button>
          </form>
        </div>
        <div class="modal-footer">
          <small>Already signed up? <a href="login.htm">Login here</a>.</small>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>