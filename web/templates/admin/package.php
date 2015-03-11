<?
require_once "func.php";
$back = getBack("/list/package/");
?>


<form id="vstobjects" name="<?=$formName ?>" method="post">
	<div class="content-wrapper">
		<?php include "content_header.php" ?>

		<!-- Main content -->
		<section class="content">

			<? if (isEditPage($formName)) : ?>
				<div class="row">

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-info"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Status</span>
								<span class="info-box-number"><?php echo __($v_status) ?></span>
							</div><!-- /.info-box-content -->
						</div><!-- /.info-box -->

					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Created Date</span>
								<span class="info-box-number"><?php echo strftime("%d %b %Y", strtotime($v_date))?> <br/><?php echo $v_time?></span>
							</div><!-- /.info-box-content -->
						</div><!-- /.info-box -->

					</div>
				</div>
			<? endif; ?>

			<div class="row">

				<div class="col-md-7">

					<? if (!empty($_SESSION['error_msg'])) : ?>
						<div class="callout callout-danger">
							<h4>Error</h4>
							<p><?=$_SESSION['error_msg'] ?></p>
						</div>
					<? elseif (!empty($_SESSION['ok_msg'])) : ?>
						<div class="callout callout-info">
							<h4>Info</h4>
							<p><?=$_SESSION['ok_msg'] ?></p>
						</div>
					<? endif; ?>

					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"><?=$title ?></h3>
						</div>

						<div class="box-body">
							<div class="form-group">
								<label>
									<?php print __('Package Name');?>
								</label>
							</div>

							<div class="form-group">
								<input type="text"  class="vst-input form-control" name="v_package" <?php if (!empty($v_package)) echo "value=".$v_package; ?> <? editDisabled($formName) ?> >

								<? if (isEditPage($formName)) : ?>
									<input type="hidden" name="v_package" <?php if (!empty($v_package)) echo "value=".$v_package; ?>>
								<? endif; ?>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Web Template');?>
								</label>

								<select class="vst-list form-control" name="v_web_template">
									<?php
									foreach ($web_templates as $key => $value) {
										echo "\t\t\t\t<option value=\"".$value."\"";
										if ((!empty($v_web_template)) && ( $value == $v_web_template)){
											echo ' selected' ;
										}
										if ((!empty($v_web_template)) && ( $value == $_POST['v_web_template'])){
											echo ' selected' ;
										}
										echo ">".$value."</option>\n";
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label>
									<?php print __('DNS Template');?>
								</label>

								<select class="vst-list form-control" name="v_dns_template">
									<?php
									foreach ($dns_templates as $key => $value) {
										echo "\t\t\t\t<option value=\"".$value."\"";
										if ((!empty($v_dns_template)) && ( $value == $v_dns_template)){
											echo ' selected' ;
										}
										if ((!empty($v_dns_template)) && ( $value == $_POST['v_dns_template'])){
											echo ' selected' ;
										}
										echo ">".$value."</option>\n";
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label><?php print __('Proxy Template');?></label>

								<select class="vst-list form-control" name="v_proxy_template">
									<?php
									foreach ($proxy_templates as $key => $value) {
										echo "\t\t\t\t<option value=\"".$value."\"";
										if ((!empty($v_proxy_template)) && ( $value == $v_proxy_template)){
											echo ' selected' ;
										}
										if ((!empty($v_proxy_template)) && ( $value == $_POST['v_proxy_template'])){
											echo ' selected' ;
										}
										echo ">".$value."</option>\n";
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label><?php print __('SSH Access');?></label>
								<select class="vst-list form-control" name="v_shell">
									<?php
									foreach ($shells as $key => $value) {
										echo "\t\t\t\t<option value=\"".$value."\"";
										if ((!empty($v_shell)) && ( $value == $v_shell)){
											echo ' selected' ;
										}
										if ((!empty($v_shell)) && ( $value == $_POST['v_shell'])){
											echo ' selected' ;
										}
										echo ">".$value."</option>\n";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>
									<?php print __('Web Domains');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_web_domains" <?php if (isset($v_web_domains)) echo "value=".$v_web_domains; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Web Aliases');?> <span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('per domain');?>)</span>
								</label>
								<input type="text"  class="vst-input form-control" name="v_web_aliases" <?php if (isset($v_web_aliases)) echo "value=".$v_web_aliases; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('DNS domains');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_dns_domains" <?php if (isset($v_dns_domains)) echo "value=".$v_dns_domains; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('DNS records');?> <span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('per domain');?>)</span>
								</label>
								<input type="text"  class="vst-input form-control" name="v_dns_records" <?php if (isset($v_dns_records)) echo "value=".$v_dns_records; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Mail Domains');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_mail_domains" <?php if (isset($v_mail_domains)) echo "value=".$v_mail_domains; ?>>

							</div>
							<div class="form-group">

								<label>
									<?php print __('Mail Accounts');?> <span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('per domain');?>)</span>
								</label>
								<input type="text"  class="vst-input form-control" name="v_mail_accounts" <?php if (isset($v_mail_accounts)) echo "value=".$v_mail_accounts; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Databases');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_databases" <?php if (isset($v_databases)) echo "value=".$v_databases; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Cron Jobs');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_cron_jobs" <?php if (isset($v_cron_jobs)) echo "value=".$v_cron_jobs; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Backups');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_backups" <?php if (isset($v_backups)) echo "value=".$v_backups; ?>>

							</div>
							<div class="form-group">
								<label>
									<?php print __('Quota');?> <span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('in megabytes');?>)</span>
								</label>
								<input type="text"  class="vst-input form-control" name="v_disk_quota" <?php if (isset($v_disk_quota)) echo "value=".$v_disk_quota; ?>>

							</div>
							<div class="form-group">
								<label>
									<?php print __('Bandwidth');?> <span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('in megabytes');?>)</span>
								</label>
								<input type="text"  class="vst-input form-control" name="v_bandwidth" <?php if (isset($v_bandwidth)) echo "value=".$v_bandwidth; ?>>

							</div>
							<div class="form-group">
								<label>
									<?php print __('Name Servers');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_ns1" <?php if (!empty($v_ns1)) echo "value=".$v_ns1; ?>>
							</div>

							<div class="form-group">
								<input type="text"  class="vst-input form-control" name="v_ns2" <?php if (!empty($v_ns2)) echo "value=".$v_ns2; ?>>
							</div>

							<div class="form-group">
								<input type="text"  class="vst-input form-control" name="v_ns3" <?php if (!empty($v_ns3)) echo "value=".$v_ns3; ?>>

							</div>

							<div class="form-group">
								<input type="text"  class="vst-input form-control" name="v_ns4" <?php if (!empty($v_ns4)) echo "value=".$v_ns4; ?>>
							</div>

						</div>

						<div class="box-footer">
							<input type="submit" name="<?=$submitName ?>" value="<?php print $submitButtonName ?>" class="btn btn-primary">
							<input type="button" class="btn" value="<?php print __('Back');?>" onclick="<?php echo $back ?>">

						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</form>