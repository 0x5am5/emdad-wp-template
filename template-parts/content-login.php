<div class="content__section form__pad">
	<div class="grid">
		<div class="w-50 col alpha">
			<div class="pad">
				<h2 class="h3">Enter</h2>

				<form action="http://localhost:8888/emdad-wp/wp-login.php" method="post">
					<div class="form-row">
						<label for="log">Username</label>
						<input type="text" name="log" id="log" value=""> 			
					</div>
					<div class="form-row">
						<label for="pwd">Password</label>
						<input type="password" name="pwd" id="pwd"> 						
					</div>
					<div class="form-row">
						<button type="submit" name="submit" class="button">Enter</button>					
					</div>					
					<input type="hidden" name="redirect_to" value="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
				</form>						
			</div>
		</div>
		<div class="w-50 col omega">
			<div class="pad">
				<h2 class="h3">Request Password</h2>
				<p>
					Hi!<br>
					Thanks for visitng my portfolio. Due to the confidential nature of some of my work I need to hide it behind a password.
				</p>
				<p>
					Please contact me on the email below or fill out the form to let me know who you are so that I can provide you with a password to view my portfolio.
				</p>
				<p>
					Sorry for the inconvenience!
				</p>
				<p>
					<a href="mailto:emdad@3dux.co.uk" class="link-text">emdad@3dux.co.uk</a>
				</p>

				<hr class="or-rule">

				<p>Fill out the form below</p>

				<form name="contact-form" action="http://samgregorydigital.co.uk/mail/emdad/contact-request.php" method="post">
					<div class="form-row">
						<label for="full-name">Name</label>
						<input type="text" id="full-name" name="full-name" required value="">
					</div>
					<div class="form-row">
						<label for="organisation">Organisation</label>
						<input type="text" id="organisation" name="organisation" required value="">
					</div>
					<div class="form-row">
						<label for="email">Email</label>
						<div class="field">
							<input type="email" id="email" name="email" required></input>
							<i class="valid"></i>							
						</div>
					</div>
					<div class="form-row">
						<button type="submit">Send</button>
					</div>
				</form>						
			</div>
		</div>
	</div>			
</div>