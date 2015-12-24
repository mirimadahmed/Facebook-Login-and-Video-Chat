<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<a href="#" class="active" id="login-form-link">Login</a>
						</div>
						<div class="col-xs-6">
							<a href="#" id="register-form-link">Register</a>
						</div>
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="login-form" action="scripts/login.php" method="post" role="form" style="display: block;">
								<div class="form-group">
									<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<a href="<?php echo $facebook->getLoginUrl(array('scope' => 'email, public_profile' )); ?>" class="btn azm-social azm-btn azm-border-bottom azm-facebook"><i class="fa fa-facebook"></i> Log in with Facebook</a>
										</div>
									</div>
								</div>
							</form>
							<form id="register-form" action="scripts/register.php" method="post" role="form" style="display: none;">
								<div class="form-group">
									<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
								</div>
								<div class="form-group">
									<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
								</div>
								<div class="form-group">
									<div class="input-group">
								      <span class="input-group-addon">
								        <input type="radio" aria-label="..." name="gender" value="Male" required>
								      </span>
								      <input type="text" class="form-control" aria-label="..." value="Male" disabled="true">
								      <span class="input-group-addon">
								        <input type="radio" aria-label="..." name="gender" value="Female" required>
								      </span>
								      <input type="text" class="form-control" aria-label="..." value="Female" disabled="true">
								    </div><!-- /input-group -->
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>