<?php if (!empty($errors)): ?>
	<div class="errors">
		<p>Your account could not be created, please check the following:</p>
		<ul>
		<?php foreach ($errors as $error): ?>
			<li><?= $error ?></li>
		<?php endforeach; 	?>
		</ul>
	</div>
<?php endif; ?>
	<form action="" method="post">
			
	<label for="email">Your email address (as your username)</label>
    <input name="author[email]" id="email" type="text" value="<?=$author['email'] ?? ''?>">

    <!--yxie - create input for first name and last name -->
    <label for="firstname">First Name</label>
    <input name="author[f_name]" id="fname" type="text" value="<?=$author['f_tname'] ?? ''?>">

	<label for="lastname">Last Name</label>
    <input name="author[l_name]" id="lname" type="text" value="<?=$author['l_name'] ?? ''?>">

	<label for="phone">Phone Number</label>
    <input name="author[phone]" id="phone" type="text" value="<?=$author['phone'] ?? ''?>">

    <label for="password">Password</label>
    <input name="author[password]" id="password" type="password" value="<?=$author['password'] ?? ''?>">
 
    <input type="submit" name="submit" value="Register account">
	</form>
