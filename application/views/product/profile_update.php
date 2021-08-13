<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>install/assets/css/style.css">
<?php if ($req == 'workshop') {$hd ='Workshop'; $hds = 'workshop'; $url='workshop';}else{$hd ='Shop'; $hds='shop';$url = '';}?>
<div id="wrapper">
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-sm-12 col-md-offset-2">
	            <div class="row">
	                <div class="col-sm-12 logo-cnt">
	                   <h1 class="page-title page-title-product m-b-15"><?php echo ("Open a ".$hd); ?></h1>
	                   <p style="font-size: 15px;"><?php echo ("In order to own a ".$hds.", you must be a verified member. fill in the bellow form carefully and wait for admin aproval."); ?></p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12">
	                    <div class="install-box">
	                        <div class="steps">
	                            <div class="step-progress">
	                                <div class="step-progress-line" data-now-value="20" data-number-of-steps="5" style="width: 20%;"></div>
	                            </div>
	                            <div class="step active">
	                                <div class="step-icon"><i class="icon-user"></i></div>
	                                <p><?php echo trans("update_profile"); ?></p>
	                            </div>
	                            <div class="step">
	                                <div class="step-icon"><i class="icon-phone"></i></div>
	                                <p><?php echo trans("contact_informations"); ?></p>
	                            </div>
	                            <div class="step">
	                                <div class="step-icon"><i class="icon-wallet"></i></div>
	                                <p><?php echo trans("payout_settings"); ?></p>
	                            </div>
	                            <div class="step">
	                                <div class="step-icon"><i class="icon-envelope"></i></div>
	                                <p><?php echo trans("social_media"); ?></p>
	                            </div>
	                            <div class="step">
	                                <div class="step-icon"><i class="icon-cart"></i></div>
	                                <p><?php echo ($hd." Opening"); ?></p>
	                            </div>
	                        </div>

	                        <div class="step-contents">
	                            <div class="tab-1">
	                                <h1 class="step-title"><?php echo trans("update_profile"); ?></h1>
	                                <div class="col-sm-12 col-md-12">
		                                <div class="row">
											<div class="row-custom">
							                    <div class="profile-tab-content">
							                        <!-- include message block -->
							                        <?php $this->load->view('partials/_messages'); ?>
							                        <?php echo form_open_multipart("profile_controller/update_profile_post", ['id' => 'form_validate']); ?>
							                        <input type="hidden" name="cnt" id="cnt" value="<?php echo ("start-selling?req=".$url."&&move=coin"); ?>">
							                        <div class="form-group">
							                            <center>
							                                <img src="<?php echo get_user_avatar($user); ?>" alt="<?php echo $user->username; ?>" class="form-avatar">
							                            
							                            
							                                <a class='btn btn-md btn-secondary btn-file-upload'>
							                                    <?php echo trans('select_image'); ?>
							                                    <input type="file" name="file" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info').html($(this).val().replace(/.*[\/\\]/, ''));">
							                                </a>
							                                <span class='badge badge-info' id="upload-file-info"></span>
							                            </center>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans("email_address"); ?></label>
							                            <?php if ($this->general_settings->email_verification == 1): ?>
							                                <?php if ($user->email_status == 1): ?>
							                                    &nbsp;
							                                    <small class="text-success">(<?php echo trans("confirmed"); ?>)</small>
							                                <?php else: ?>
							                                    &nbsp;
							                                    <small class="text-danger">(<?php echo trans("unconfirmed"); ?>)</small>
							                                    <button type="submit" name="submit" value="resend_activation_email" class="btn float-right btn-resend-email"><?php echo trans("resend_activation_email"); ?></button>
							                                <?php endif; ?>
							                            <?php endif; ?>

							                            <input type="email" name="email" class="form-control form-input" value="<?php echo html_escape($user->email); ?>" placeholder="<?php echo trans("email_address"); ?>" required>
							                        </div>
							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans("username"); ?></label>
							                            <input type="text" name="username" class="form-control form-input" value="<?php echo html_escape($user->username); ?>" placeholder="<?php echo trans("username"); ?>" maxlength="<?php echo $this->username_maxlength; ?>" required>
							                        </div>

							                        <div class="form-group m-t-10">
							                            <div class="row">
							                                <div class="col-12">
							                                    <label class="control-label"><?php echo trans('email_option_send_email_new_message'); ?></label>
							                                </div>
							                                <div class="col-md-3 col-sm-4 col-12 col-option">
							                                    <div class="custom-control custom-radio">
							                                        <input type="radio" name="send_email_new_message" value="1" id="send_email_new_message_1" class="custom-control-input" <?php echo ($user->send_email_new_message == 1) ? 'checked' : ''; ?>>
							                                        <label for="send_email_new_message_1" class="custom-control-label"><?php echo trans("yes"); ?></label>
							                                    </div>
							                                </div>
							                                <div class="col-md-3 col-sm-4 col-12 col-option">
							                                    <div class="custom-control custom-radio">
							                                        <input type="radio" name="send_email_new_message" value="0" id="send_email_new_message_2" class="custom-control-input" <?php echo ($user->send_email_new_message != 1) ? 'checked' : ''; ?>>
							                                        <label for="send_email_new_message_2" class="custom-control-label"><?php echo trans("no"); ?></label>
							                                    </div>
							                                </div>
							                            </div>
							                        </div>

							                        <button type="submit" name="submit" value="update" class="btn btn-md btn-custom float-right"><?php echo trans("next") ?></button>
							                        <?php echo form_close(); ?>

							                    </div>
							                </div>
		                                </div>
	                            	</div>
	                            </div>
	                        </div>

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	
</div>
<!-- Wrapper End-->
