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
	                                <div class="step-progress-line" data-now-value="80" data-number-of-steps="5" style="width: 80%;"></div>
	                            </div>
	                            <div class="step">
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
	                            <div class="step active">
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
	                                <h1 class="step-title"><?php echo trans("social_media"); ?><label style="font-size: 15px;"> &nbsp; (Fill in atleast one)</label></h1>
	                                <div class="row">
	                                	<div class="col-sm-12 col-md-12">
							                <div class="row-custom">
							                    <div class="profile-tab-content">
							                        <!-- include message block -->
							                        <?php $this->load->view('partials/_messages'); ?>
							                        <?php echo form_open("profile_controller/social_media_post", ['id' => 'form_validate']); ?>
							                        <input type="hidden" name="cnt" id="cnt" value="<?php echo ("start-selling?req=".$url."&&move=woop"); ?>">

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('facebook_url'); ?></label>
							                            <input type="text" class="form-control form-input" name="facebook_url"
							                                   placeholder="<?php echo trans('facebook_url'); ?>" value="<?php echo html_escape($user->facebook_url); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('twitter_url'); ?></label>
							                            <input type="text" class="form-control form-input"
							                                   name="twitter_url" placeholder="<?php echo trans('twitter_url'); ?>"
							                                   value="<?php echo html_escape($user->twitter_url); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('instagram_url'); ?></label>
							                            <input type="text" class="form-control form-input" name="instagram_url" placeholder="<?php echo trans('instagram_url'); ?>"
							                                   value="<?php echo html_escape($user->instagram_url); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('pinterest_url'); ?></label>
							                            <input type="text" class="form-control form-input" name="pinterest_url" placeholder="<?php echo trans('pinterest_url'); ?>"
							                                   value="<?php echo html_escape($user->pinterest_url); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('linkedin_url'); ?></label>
							                            <input type="text" class="form-control form-input" name="linkedin_url" placeholder="<?php echo trans('linkedin_url'); ?>"
							                                   value="<?php echo html_escape($user->linkedin_url); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('vk_url'); ?></label>
							                            <input type="text" class="form-control form-input" name="vk_url"
							                                   placeholder="<?php echo trans('vk_url'); ?>" value="<?php echo html_escape($user->vk_url); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('youtube_url'); ?></label>
							                            <input type="text" class="form-control form-input" name="youtube_url"
							                                   placeholder="<?php echo trans('youtube_url'); ?>" value="<?php echo html_escape($user->youtube_url); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
							                        </div>

							                       	<div class="form-group">
														<a href="<?php echo lang_base_url() . "start-selling?req=".$url."&&move=pase"; ?>" class="btn btn-success btn-custom float-left">Prev</a>
														<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("next"); ?></button>
													</div>
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