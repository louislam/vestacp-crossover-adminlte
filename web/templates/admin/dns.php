<?
require_once "func.php";
$back = getBack("/list/dns/");
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
									<?php print __('Domain');?>
								</label>

								<input type="text" class="vst-input form-control" name="v_domain" <?php if (!empty($v_domain)) echo "value=".$v_domain;  ?> <? editDisabled($formName) ?>>

								<? if (isEditPage($formName)) : ?>
									<input type="hidden" name="v_domain" <?php if (!empty($v_domain)) echo "value=".$v_domain;  ?>>
								<? endif; ?>

							</div>

							<div class="form-group">
								<label>
									<?php print __('IP address');?>
								</label>
								<input type="text" class="vst-input form-control" name="v_ip" <?php if (!empty($v_ip)) echo "value=".$v_ip; ?>>

							</div>



							<? if (! isEditPage($formName)) : ?>

								<a href="javascript:elementHideShow('advtable');" class="vst-advanced"><?php print __('Advanced options');?></a>


								<div id="advtable" style="display:<?php if (empty($v_adv)) echo 'none';?> ;">
									<div class="form-group">
										<label>
											<?php print __('Expiration Date');?> <span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('YYYY-MM-DD');?>)</span>
										</label>
										<input type="text" class="vst-input form-control" name="v_exp" <?php if (!empty($v_exp)) echo "value=".$v_exp; ?>>

									</div>

									<div class="form-group">
										<label>
											TTL
										</label>
										<input type="text" class="vst-input form-control" name="v_ttl" <?php if (!empty($v_ttl)) echo "value=".$v_ttl; ?>>

									</div>
									<div class="form-group">
										<label>
											<?php print __('Name servers');?>
										</label>
										<input type="text" class="vst-input form-control" name="v_ns1" <?php if (!empty($v_ns1)) echo "value=".$v_ns1; ?>>

									</div>

									<div class="form-group">
										<input type="text" class="vst-input form-control" name="v_ns2" <?php if (!empty($v_ns2)) echo "value=".$v_ns2; ?>>

									</div>

									<div class="form-group">
										<input type="text" class="vst-input form-control" name="v_ns3" <?php if (!empty($v_ns3)) echo "value=".$v_ns3; ?>>

									</div>

									<div class="form-group">
										<input type="text" class="vst-input form-control" name="v_ns4" <?php if (!empty($v_ns4)) echo "value=".$v_ns4; ?>>

									</div>

								</div>

								<? else : ?>
								<div class="form-group">
									<label>   <?php print __('Template');?></label>
								</div>

								<div class="form-group">

									<select class="vst-list form-control" name="v_template">
										<?php
										foreach ($templates as $key => $value) {
											echo "\t\t\t\t<option value=\"".$value."\"";
											$svalue = "'".$value."'";
											if ((!empty($v_template)) && ( $value == $v_template ) || ($svalue == $v_template)){
												echo ' selected' ;
											}
											echo ">".$value."</option>\n";
										}
										?>
									</select>
								</div>


								<div class="form-group">
									<label>
										<?php print __('Expiration Date');?><span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('YYYY-MM-DD');?>)</span>
									</label>
									<input type="text"  class="vst-input form-control" name="v_exp" <?php if (!empty($v_exp)) echo "value=".$v_exp; ?>>

								</div>


								<div class="form-group">
									<label>
										SOA
									</label>
									<input type="text"  class="vst-input form-control" name="v_soa" <?php if (!empty($v_soa)) echo "value=".$v_soa; ?>>

								</div>
								<div class="form-group">
									<label>
										TTL
									</label>
									<input type="text"  class="vst-input form-control" name="v_ttl" <?php if (!empty($v_ttl)) echo "value=".$v_ttl; ?>>

								</div>
								<div class="form-group">

								</div>

							<? endif; ?>




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