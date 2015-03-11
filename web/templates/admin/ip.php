<?
require_once "func.php";
$back = getBack("/list/ip/");
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
									<?php print __('IP address') ?>
								</label>

								<input type="text"  class="vst-input form-control" name="v_ip" <?php if (!empty($v_ip)) echo "value=".$v_ip; ?> <? editDisabled($formName) ?>>



							</div>

							<div class="form-group">
								<label><?php print __('Netmask');?> </label>

								<input type="text"  class="vst-input form-control" name="v_netmask" <?php if (!empty($v_netmask)) echo "value=".$v_netmask; ?> <? editDisabled($formName) ?>>

							</div>

							<div class="form-group">
								<label><?php print __('Interface');?></label>
								
								<? if (isEditPage($formName)) : ?>

									<input type="text" class="vst-input form-control" name="v_netmask" <?php if (!empty($v_interace)) echo "value=".$v_interace; ?> disabled>

								<? else : ?>
									<select class="vst-list form-control" name="v_interface">
										<?php
										foreach ($interfaces as $key => $value) {
											echo "\t\t\t\t<option value=\"".$value."\"";
											if ((!empty($v_interface)) && ( $value == $v_interface )) echo ' selected';
											echo ">".$value."</option>\n";
										}
										?>
									</select>
								<? endif; ?>
								
								


							</div>

							<div class="form-group">
								<label><input type="checkbox"  class="vst-checkbox" name="v_shared" <?php if (empty($v_dedicated)) echo "checked=yes" ?> onclick="javascript:elementHideShow('usrtable');"> <?php print __('Shared');?></label>
							</div>

							<div style="display:<?php if (empty($v_dedicated)) { echo 'none';} else {echo 'block';}?> ;" id="usrtable">
								<div class="form-group">
									<label>
										<?php print __('Assigned user');?>
									</label>

									<select class="vst-list form-control" name="v_owner">
										<?php
										foreach ($users as $key => $value) {
											echo "\t\t\t\t<option value=\"".$value."\"";
											if ((!empty($v_owner)) && ( $value == $v_owner )) echo ' selected';
											echo ">".$value."</option>\n";
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label>
									<?php print __('Assigned domain');?> <span class="optional">(<?php print __('optional');?>)</span>
								</label>

								<input type="text"  class="vst-input form-control" name="v_name" <?php if (!empty($v_name)) echo "value=".$v_name; ?>>

							</div>
							<div class="form-group">
								<label>
									<?php print __('NAT IP association');?> <span class="optional"">(<?php print __('optional');?>)</span>

								</label>
								<input type="text"  class="vst-input form-control" name="v_nat" <?php if (!empty($v_nat)) echo "value=".$v_nat; ?>>

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