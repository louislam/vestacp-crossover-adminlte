<?
require_once "func.php";
$back = getBack("/list/web/");
?>


<form id="vstobjects" name="<?= $formName ?>" method="post">
	<div class="content-wrapper">
		<?php include "content_header.php" ?>

		<!-- Main content -->
		<section class="content">

			<? if ($formName == "v_edit_db") : ?>
				<div class="row">

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-info"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Status</span>
								<span class="info-box-number"><?php echo __($v_status) ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->

					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Created Date</span>
								<span class="info-box-number"><?php echo strftime("%d %b %Y", strtotime($v_date)) ?> <br/><?php echo $v_time ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->

					</div>
				</div>
			<? endif; ?>

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


					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1" data-toggle="tab"><?= __("Basic") ?></a></li>
							<li><a href="#tab_2" data-toggle="tab"><?= __("Advanced") ?></a></li>
							<li><a href="#tab_ssl" data-toggle="tab"><?= __("SSL") ?></a></li>
							<li><a href="#tab_ftp" data-toggle="tab"><?= __("Additional FTP") ?></a></li>
							<li><a href="#tab_stats" data-toggle="tab"><?php print __('Web Statistics'); ?></a></li>
						</ul>
						<div class="tab-content">

							<div class="tab-pane active" id="tab_1">
								<div class="form-group">
									<label><?php print __('Domain'); ?></label>
									<? if (!isEditPage($formName)) : ?>
										<input type="text" class="form-control" name="v_domain" id="v_domain" <?php if (!empty($v_domain)) echo "value=" . $v_domain; ?>>

									<? else : ?>

									<? endif; ?>


								</div>

								<div class="form-group">
									<label><?php print __('IP address'); ?> </label>

									<select class="vst-list form-control" name="v_ip">
										<?php
										foreach ($ips as $key => $value) {
											$display_ip = $key;
											if (!empty($value['NAT'])) $display_ip = $value['NAT'];
											echo "\t\t\t\t<option value=\"" . $display_ip . "\"";
											if ((!empty($v_ip)) && ($display_ip == $_POST['v_ip'])) {
												echo ' selected';
											}
											echo ">" . $display_ip . "</option>\n";
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label><input type="checkbox" class="minimal" name="v_dns" <?php if (empty($v_dns)) echo "checked=yes"; ?>> <?php print __('DNS Support'); ?></label>

								</div>

								<div class="form-group">
									<label><input type="checkbox" class="minimal" name="v_mail" <?php if (empty($v_mail)) echo "checked=yes"; ?>> <?php print __('Mail Support'); ?></label>

								</div>

							</div>

							<div class="tab-pane" id="tab_2">

								<div class="form-group">
									<label><?php print __('Aliases'); ?></label>
									<textarea class="vst-textinput form-control" name="v_aliases" id="v_aliases"><?php if (!empty($v_aliases)) echo $v_aliases; ?></textarea>
								</div>

								<div class="form-group" style="display:<?php if ($v_proxy == 'off') {
									echo 'none';
								} else {
									echo 'block';
								} ?>;" id="proxytable">
									<label><?php print __('Proxy Extentions'); ?></label>
									<textarea rows="5" class="vst-textinput form-control" name="v_proxy_ext"><?php if (!empty($v_proxy_ext)) {
											echo $v_proxy_ext;
										} else {
											echo 'jpeg, jpg, png, gif, bmp, ico, svg, tif, tiff, css, js, htm, html, ttf, otf, webp, woff, txt, csv, rtf, doc, docx, xls, xlsx, ppt, pptx, odf, odp, ods, odt, pdf, psd, ai, eot, eps, ps, zip, tar, tgz, gz, rar, bz2, 7z, aac, m4a, mp3, mp4, ogg, wav, wma, 3gp, avi, flv, m4v, mkv, mov, mp4, mpeg, mpg, wmv, exe, iso, dmg, swf';
										} ?></textarea>

								</div>

								<div class="form-group">
									<label><input type="checkbox" class="" name="v_proxy" <?php if ($v_proxy !== 'off') echo "checked=yes" ?> onclick="javascript:elementHideShow('proxytable');"> <?php print __('Proxy Support'); ?></label>

								</div>

							</div>

							<div class="tab-pane" id="tab_ssl">
								<div class="form-group">
									<label><input type="checkbox" class="" name="v_ssl" <?php if ($v_ssl == 'yes' || $v_ssl == 'on') echo "checked=yes" ?> onclick="javascript:elementHideShow('ssltable');"> <?php print __('SSL Support'); ?></label> /
									<a class="generate" target="_blank" href="/generate/ssl/"><?php print __('Generate CSR') ?></a>

								</div>

								<div id="ssltable" style="display:<?php if (empty($v_ssl)) { echo 'none';} else {echo 'block';}?>;" >
									<div class="form-group">
										<label><?php print __('SSL Home Directory'); ?></label>
										<select class="vst-list form-control" name="v_ssl_home">
											<option value='same' <?php if ($v_ssl_home == 'same') echo "selected"; ?>>
												public_html
											</option>
											<option value='single' <?php if ($v_ssl_home == 'single') echo "selected"; ?>>
												public_shtml
											</option>
										</select>
									</div>

									<div class="form-group">
										<label><?php print __('SSL Certificate'); ?></label>
										<textarea class="vst-textinput form-control" name="v_ssl_crt"><?php if (!empty($v_ssl_crt)) echo $v_ssl_crt; ?></textarea>
									</div>

									<div class="form-group">
										<label><?php print __('SSL Key'); ?></label>
										<textarea class="vst-textinput form-control" name="v_ssl_key"><?php if (!empty($v_ssl_key)) echo $v_ssl_key; ?></textarea>
									</div>

									<div class="form-group">
										<label>  <?php print __('SSL Certificate Authority / Intermediate'); ?> <span class="optional">(<?php print __('optional'); ?>)</span></label>
										<textarea class="vst-textinput form-control" name="v_ssl_ca"><?php if (!empty($v_ssl_ca)) echo $v_ssl_ca; ?></textarea>

									</div>
								</div>


							</div>

							<div class="tab-pane" id="tab_ftp">

								<input type="hidden" class="" name="v_ftp" value="true">
								<?php print __('Additional FTP Account'); ?>


								<?php print __('FTP') ?> #<span class="ftp-user-number"></span> <a class="ftp-remove-user additional-control do_delete" onCLick="App.Actions.WEB.remove_ftp_user(this)">(<?php print __('delete') ?>)</a>
								<input type="hidden" class="v-ftp-user-deleted" name="v_ftp_user[%INDEX%][delete]" value="0"/>
								<input type="hidden" class="v-ftp-user-is-new" name="v_ftp_user[%INDEX%][is_new]" value="1"/>

								<?php foreach ($v_ftp_users as $i => $ftp_user): ?>

									<?php
									$v_ftp_user = $ftp_user['v_ftp_user'];
									$v_ftp_password = $ftp_user['v_ftp_password'];
									$v_ftp_path = $ftp_user['v_ftp_path'];
									$v_ftp_email = $ftp_user['v_ftp_email'];
									$v_ftp_pre_path = $ftp_user['v_ftp_pre_path'];
									?>

									<div <?php echo (!empty($v_ftp)) ? "style='display: block'" : "style='display:none;'" ?> class="ftptable ftptable-nrm" name="v_add_domain_ftp">
										<?php print __('FTP') ?> #<span class="ftp-user-number"><?php print $i + 1; ?></span>
										<a class="ftp-remove-user additional-control do_delete" onCLick="App.Actions.WEB.remove_ftp_user(this)">(<?php print __('delete') ?>)</a>
										<input type="hidden" class="v-ftp-user-deleted" name="v_ftp_user[<?php print $i ?>][delete]" value="0"/>
										<input type="hidden" class="v-ftp-user-is-new" name="v_ftp_user[<?php print $i ?>][is_new]" value="<?php print $ftp_user['is_new'] ?>"/>

									</div>
								<? endforeach; ?>

								<div class="form-group">
									<label>
										<?php print __('Username'); ?><br>
										<span style="font-size: 10pt; color:#777;"><?php print __('Prefix will be automaticaly added to username', $user . "_"); ?></span>
									</label>

									<input type="text" class="vst-input v-ftp-user form-control" name="v_ftp_user[%INDEX%][v_ftp_user]" value="">

									<small class="hint"></small>
								</div>

								<div class="form-group">
									<label><?php print __('Password'); ?> / <a href="javascript:void(0);" onclick="FTPrandom(this)" class="generate"><?php print __('generate'); ?></a>
									</label>
									<input type="text" class="vst-input v-ftp-user-psw password form-control" name="v_ftp_user[%INDEX%][v_ftp_password]" value="">

								</div>

								<div class="form-group">
									<label>
										<?php print __('Path'); ?>
									</label>
									<input type="hidden" class="vst-input v-ftp-pre-path" name="v_ftp_pre_path" value="">
									<input type="text" class="vst-input v-ftp-path form-control" name="v_ftp_user[%INDEX%][v_ftp_path]" value="">

									<span class="ftp-path-prefix"><?php print $v_ftp_pre_path_new_user ?></span><span class="ftp-path-value v-ftp-path-hint"></span>

								</div>

								<div class="form-group">
									<label>
										<?php print __('Send FTP credentials to email'); ?>

									</label>
									<input type="text" class="vst-input form-control" name="v_ftp_user[%INDEX%][v_ftp_email]" value="">

								</div>
							</div>

							<div class="tab-pane" id="tab_stats">
								<div class="form-group">
									<label> <?php print __('Web Statistics'); ?></label>
									<select class="vst-list form-control" name="v_stats">
										<?php
										foreach ($stats as $key => $value) {
											$svalue = "'" . $value . "'";
											echo "\t\t\t\t<option value=\"" . $value . "\"";
											if (empty($v_stats)) $v_stats = 'none';
											if (($value == $v_stats) || ($svalue == $v_stats)) {
												echo ' selected';
											}
											echo ">" . __($value) . "</option>\n";
										}
										?>
									</select>
								</div>


								<div class="form-group">
									<label><input type="checkbox" class="" name="v_stats_auth" <?php if (!empty($v_stats_user)) echo "checked=yes" ?> onclick="javascript:elementHideShow('statstable');"> <?php print __('Statistics Authorization'); ?></label>

								</div>

								<div style="display:<?php if (empty($v_stats_user)) {
									echo 'none';
								} else {
									echo 'block';
								} ?> ;" id="statstable" name="v-add-web-domain-stats-user">

									<div class="form-group">
										<label>(Statistics) <?php print __('Username'); ?></label>
										<input type="text" class="vst-input form-control" name="v_stats_user" <?php if (!empty($v_stats_user)) echo "value=" . $v_stats_user; ?>>

									</div>

									<div class="form-group">
										<label>
											(Statistics) <?php print __('Password'); ?> / <a href="javascript:WEBrandom();" class="generate"><?php print __('generate'); ?></a>
										</label>
										<input type="text" class="vst-input password form-control" name="v_stats_password" <?php if (!empty($v_stats_password)) echo "value=" . $v_stats_password; ?> id="v_password">

									</div>


								</div>
							</div>
						</div>

						<div class="box-footer">
							<input type="submit" name="<?= $submitName ?>" value="<?php print $submitButtonName ?>" class="btn btn-primary">
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
		$("#v_domain").change(function () {
			var prefix = 'www.';
			document.getElementById('v_aliases').value = prefix + document.getElementById('v_domain').value;
		});
	});
	function WEBrandom() {
		var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
		var string_length = 10;
		var webrandom = '';
		for (var i = 0; i < string_length; i++) {
			var rnum = Math.floor(Math.random() * chars.length);
			webrandom += chars.substring(rnum, rnum + 1);
		}
		document.v_add_web.v_stats_password.value = webrandom;
	}

	function FTPrandom(elm) {
		var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
		var string_length = 10;
		var ftprandomstring = '';
		for (var i = 0; i < string_length; i++) {
			var rnum = Math.floor(Math.random() * chars.length);
			ftprandomstring += chars.substring(rnum, rnum + 1);
		}
		$(elm).parents('.ftptable').find('.v-ftp-user-psw').val(ftprandomstring);
	}

	function elementHideShow(elementToHideOrShow) {
		var el = document.getElementById(elementToHideOrShow);
		if (el.style.display == "block") {
			el.style.display = "none";
		} else {
			el.style.display = "block";
			location.hash = elementToHideOrShow;
		}


	}
</script>
