<?
require_once "func.php";
$back = getBack("/list/dns/?domain=" . $v_domain);
?>


<form id="vstobjects" name="<?= $formName ?>" method="post">
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

					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"><?= $title ?></h3>
						</div>

						<div class="box-body">
							<div class="form-group">
								<label>
									<?php print __('Domain');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_domain" <?php echo "value=".$v_domain;  ?> disabled ><input type="hidden" name="v_domain" <?php echo "value=".$v_domain;  ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Record');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_rec" <?php if (!empty($v_rec)) echo "value=".$v_rec; ?> <? editDisabled($formName) ?>>

								<? if (isEditPage($formName)) : ?>
									<input type="hidden" name="v_record_id" <?php if (!empty($v_record_id)) echo "value=".$v_record_id; ?>>
									<? else : ?>

									<small class="hint"></small>
								<? endif; ?>


							</div>

							<div class="form-group">
								<label>
									<?php print __('Type');?>
								</label>

								<? if (isEditPage($formName)) : ?>
									<input type="text" class="vst-input form-control" name="v_type" <?php if (!empty($v_rec)) echo "value=".$v_type; ?> disabled>

								<? else : ?>
									<select class="vst-list form-control" name="v_type">
										<option value="A" <?php if ($v_type == 'A') echo selected; ?>>A</option>
										<option value="AAAA" <?php if ($v_type == 'AAAA') echo selected; ?>>AAAA</option>
										<option value="NS" <?php if ($v_type == 'NS') echo selected; ?>>NS</option>
										<option value="CNAME" <?php if ($v_type == 'CNAME') echo selected; ?>>CNAME</option>
										<option value="MX" <?php if ($v_type == 'MX') echo selected; ?>>MX</option>
										<option value="TXT" <?php if ($v_type == 'TXT') echo selected; ?>>TXT</option>
										<option value="SRV" <?php if ($v_type == 'SRV') echo selected; ?>>SRV</option>
										<option value="DNSKEY" <?php if ($v_type == 'DNSKEY') echo selected; ?>>DNSKEY</option>
										<option value="KEY" <?php if ($v_type == 'KEY') echo selected; ?>>KEY</option>
										<option value="IPSECKEY" <?php if ($v_type == 'IPSECKEY') echo selected; ?>>IPSECKEY</option>
										<option value="PTR" <?php if ($v_type == 'PTR') echo selected; ?>>PTR</option>
										<option value="SPF" <?php if ($v_type == 'SPF') echo selected; ?>>SPF</option>
									</select>
								<? endif; ?>





							</div>

							<div class="form-group">
								<label>
									<?php print __('IP or Value');?>
								</label>
								<input type="text"  class="vst-input form-control" name="v_val"  <?php if (!empty($v_val)) echo "value='".$v_val."'"; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Priority');?> <span class="optional">(<?php print __('optional');?>)</span>
								</label>
								<input type="text"  class="vst-input form-control" name="v_priority" <?php if (!empty($v_priority)) echo "value=".$v_priority; ?>>

							</div>

							<? if (isEditPage($formName)) : ?>
							<label>
								<?php print __('Record Number');?> <span style="padding:0 0 0 6px; font-size: 10pt; color:#555;">(<?php print __('internal');?>)</span>
							</label>
								<input type="text"  class="vst-input form-control" name="v_record_id" <?php if (!empty($v_record_id)) echo "value=".$v_record_id; ?>>

							<? endif; ?>




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
	GLOBAL.DNS_REC_PREFIX = '<?php echo $_GET['domain']; ?>';
</script>
<script type="text/javascript" src="/js/pages/add.dns.record.js"></script>