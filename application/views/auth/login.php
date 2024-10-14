<!-- 

<form method="post" action="<?= base_url('auth/login'); ?>">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form> -->



 <div class="container">
                <div class="row">
                  <?php if ($this->session->flashdata('msg')): ?>
    <div class="alert <?php echo $this->session->flashdata('msg_class'); ?> alert-dismissible fade show" role="alert">
        <strong><?php echo $this->session->flashdata('msg'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php endif; ?>

                    <div class="col-sm-6 auth-box">
                        <div class="proclinic-box-shadow">
                            <h3 class="widget-title">Login</h3>
                            
                                <form class="widget-form" method="post" action="<?= base_url('auth/login'); ?>">


                                <!-- form-group -->
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input name="username" placeholder="Username" class="form-control" required="" data-validation="length alphanumeric" data-validation-length="3-12"
                                         data-validation-error-msg="User name has to be an alphanumeric value (3-12 chars)" data-validation-has-keyup-event="true">
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <!-- form-group -->
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" placeholder="Password" name="password" class="form-control" data-validation="strength" data-validation-strength="2"
                                         data-validation-has-keyup-event="true">
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <!-- Check Box -->      
                               <!--  <div class="form-check row">
                                    <div class="col-sm-12 text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="ex-check-2">
                                            <label class="custom-control-label" for="ex-check-2">Remember Me</label>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- /Check Box --> 
                                <!-- Login Button -->           
                                <div class="button-btn-block">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                                </div>
                                <!-- /Login Button -->  
                                <!-- Links -->  
                                <div class="auth-footer-text">
                                    <small>New User,
                                        <a href="sign-up.html">Sign Up</a> Here</small>
                                </div>
                                <!-- /Links -->
                            </form>
                        </div>
                    </div>
                </div>
</div> 