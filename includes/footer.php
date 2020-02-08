<footer>

            <p>Copyright &copy 2018 | Last updated: April 7, 2018</p>
</footer>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form name="loginForm" id="loginForm" method="post" action="index.php" novalidate>
            <div id="loginError"></div>
                <div class="form-group">
                    <label for="l_username">Username</label>
                    <input type="text" name="l_username" class="form-control" id="l_username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="l_password">Password</label>
                    <input type="password" name="l_password" class="form-control" id="l_password" placeholder="Enter password" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="l_submit" id="l_submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>   Login</button>
            <button type="reset" id="l_reset" class="btn btn-primary">Clear</button>
        </div>

    </form>
      </div>
    </div>
  </div>
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form name="registerForm" id="registerForm" method="post" action="index.php" novalidate>
                <div id="registerError"></div>
                <div class="form-group">
                    <label for="r_username">Username</label>
                    <input type="text" name="r_username" class="form-control" id="r_username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="r_password">Password</label>
                    <input type="password" name="r_password" class="form-control" id="r_password" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="r_confirmPassword">Confirm Password</label>
                    <input type="password" name="r_confirmPassword" class="form-control" id="r_confirmPassword" placeholder="Enter confirm password" required>
                </div>

                <div class="form-group">
                    <label for="r_email">Email address</label>
                    <input type="email" name="r_email" class="form-control" id="r_email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>    
            
        </div>
        <div class="modal-footer">
            <button type="submit" name="r_submit" id="r_submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>   Register</button>
            <button type="reset" id="r_reset" class="btn btn-primary">Clear</button>
        </div>

        </form>
      </div>
    </div>
</div>
<!-- Update Account Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php
            if(isset($_SESSION['currentuser'])){
                $currentuser = $_SESSION["currentuser"];
    
                $query = "SELECT * FROM users WHERE username = '$currentuser'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                    $editUsername = $row['username'];
                    $editPassword = $row['password'];
                    //$editEmail = $row['email'];
        
            echo '<form name="updateForm" id="updateForm" method="post" action="index.php" novalidate>

                <div id="updateError"></div>
                <div class="form-group">
                    <label for="u_username">Username</label>
                    <input type="text" name="u_username" class="form-control" id="u_username" value="'.$editUsername .'" required readonly>
                </div>
                <div class="form-group">
                    <label for="u_password">Password</label>
                    <input type="password" name="u_password" class="form-control" id="u_password"  value="'.$editPassword.'" required>
                </div>
                <div class="form-group">
                    <label for="u_confirmPassword">Confirm Password</label>
                    <input type="password" name="u_confirmPassword" class="form-control" id="u_confirmPassword" placeholder="Enter confirm password" required>
                </div>

                <div class="form-group">
                    <label for="u_email">Email address</label>
                    <input type="email" name="u_email" class="form-control" id="u_email" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
                </div>    
            
        </div>
        <div class="modal-footer">
            <button type="submit" name="u_submit" id="u_submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>   Update</button>
            <button type="reset" id="u_reset" class="btn btn-primary">Clear</button>
        </div>

        </form>
      </div>
    </div>
</div>';
    }
  ?>

</div>


    <!-- jQuery first, then Popper.js, then Bootstrap.js -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <!-- Full version of jQuery -->    
    <script src="js/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

    <script src="js/jquery.validate.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/contactFormValidate.js"></script>

    <script src="js/registerFormValidate.js"></script>

    <script src="js/loginFormValidate.js"></script>

    <script src="js/updateFormValidate.js"></script>
</body>
