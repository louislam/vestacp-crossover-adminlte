<?
require_once "func.php";
$back = getBack("/list/web/");
?>

<form id="vstobjects" name="<?= $formName ?>" method="post">

	<div class="content-wrapper">
		<?php include "content_header.php" ?>



		<!-- Main content -->
		<section class="content">

			<div class="row">

				<div class="col-md-7">

					<? if (!empty($_SESSION['error_msg'])) : ?>
						<div class="callout callout-danger">
							<h4>Error</h4>

							<p><?= $_SESSION['error_msg'] ?></p>
						</div>
					<? elseif (!empty($_SESSION['ok_msg'])) : ?>
						<div class="callout callout-info">
							<h4>Info</h4>

							<p><?= $_SESSION['ok_msg'] ?></p>
						</div>
					<? endif; ?>

					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"><?= $title ?></h3>
						</div>

						<div class="box-body">
							<div class="form-group">
								<label for="username"><?php print __('Username'); ?></label>
								<input type="text" id="username" class="vst-input class form-control" placeholder="<?php print __('Username'); ?>" name="v_username" <?php if (!empty($v_username)) echo "value=" . $v_username; ?> <? editDisabled($formName) ?>>
							</div>

							<div class="form-group">
								<label for="password">
									<?php print __('Password'); ?> / <a href="javascript:randomString();" class="generate"><?php print __('generate'); ?></a>
								</label>
								<input type="text" id="password" class="vst-input password form-control" placeholder="<?php print __('Password'); ?>" name="v_password"  <?php if (!empty($v_password)) echo "value=" . $v_password; ?>>
							</div>

							<div class="form-group">
								<label for="v_email"><?php print __('Email'); ?></label>
								<input type="email" class="vst-input form-control" name="v_email" id='v_email' <?php if (!empty($v_email)) echo "value=" . $v_email; ?>>
							</div>

							<div class="form-group">
								<label for="package"><?php print __('Package'); ?></label>
								<select id="package" class="vst-list form-control" name="v_package">
									<?php
									foreach ($data as $key => $value) {
										echo "\n\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"" . $key . "\"";
										if ((!empty($v_package)) && ($key == $_POST['v_package'])) {
											echo 'selected';
										} else {
											if ($key == 'default') {
												echo 'selected';
											}
										}
										echo ">" . $key . "</option>\n";
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="language"><?php print __('Language'); ?></label>

								<select class="vst-list form-control" name="v_language" id="language">
									<?php
									foreach ($languages as $key => $value) {
										echo "\n\t\t\t\t\t\t\t\t\t<option value=\"" . $value . "\"";
										$svalue = "'" . $value . "'";
										if (($value == 'en') && (empty($v_language))) {
											echo 'selected';
										}
										if (isset($v_language)) {
											if (($value == $v_language) || ($svalue == $v_language)) {
												echo 'selected';
											}
										}
										echo ">" . $value . "</option>\n";
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="v_fname"><?php print __('First Name'); ?></label>
								<input type="text" class="vst-input form-control" name="v_fname" id="v_fname" <?php if (!empty($v_fname)) echo "value=" . $v_fname; ?>>
							</div>

							<div class="form-group">
								<label for="v_lname"><?php print __('Last Name'); ?></label>
								<input type="text" class="vst-input form-control" name="v_lname" id="v_lname" <?php if (!empty($v_lname)) echo "value=" . $v_lname; ?>>
							</div>

							<? if (isEditPage($formName)) : ?>
								<div class="form-group">
									<label>
										<?php print __('SSH Access'); ?>
									</label>

									<select class="vst-list form-control" name="v_shell">
										<?php
										foreach ($shells as $key => $value) {
											echo "\t\t\t\t<option value=\"" . $value . "\"";
											$svalue = "'" . $value . "'";
											if (($value == $v_shell) || ($svalue == $v_shell)) {
												echo 'selected';
											}
											echo ">" . $value . "</option>\n";
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label>  <?php print __('Default Name Servers'); ?></label>
									<input type="text" class="vst-input form-control" name="v_ns1" <?php if (!empty($v_ns1)) echo "value=" . $v_ns1; ?>>

								</div>

								<div class="form-group">
									<input type="text" class="vst-input form-control" name="v_ns2" <?php if (!empty($v_ns2)) echo "value=" . $v_ns2; ?>>

								</div>

								<div class="form-group">
									<input type="text" class="vst-input form-control" name="v_ns3" <?php if (!empty($v_ns3)) echo "value=" . $v_ns3; ?>>

								</div>

								<div class="form-group">
									<input type="text" class="vst-input form-control" name="v_ns4" <?php if (!empty($v_ns4)) echo "value=" . $v_ns4; ?>>

								</div>
							<? else : ?>
								<div class="form-group">
									<label for="v_notify"><?php print __('Send login credentials to email address'); ?></label>
									<input type="email" class="vst-input form-control" name="v_notify" id="v_notify" <?php if (!empty($v_notify)) echo "value=" . $v_notify; ?>>

								</div>
							<? endif; ?>


						</div>

						<div class="box-footer">
							<input type="submit" name="<?= $submitName ?>" value="<?= $submitButtonName ?>" class="btn btn-primary">
							<input type="button" class="btn" value="<?php print __('Back'); ?>" onclick="<?php echo $back ?>">

						</div>
					</div>
				</div>
			</div>


		</section>
	</div>
</form>

<script type="text/javascript">
	$(function () {
		$("#v_email").change(function () {
			document.getElementById('v_notify').value = document.getElementById('v_email').value;
		});
	});

	function randomString() {
		var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
		var string_length = 10;
		var randomstring = '';
		for (var i = 0; i < string_length; i++) {
			var rnum = Math.floor(Math.random() * chars.length);
			randomstring += chars.substring(rnum, rnum + 1);
		}
		$("#password").val(randomstring);
	}
</script>