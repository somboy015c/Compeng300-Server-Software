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
	                                <div class="step-progress-line" data-now-value="40" data-number-of-steps="5" style="width: 40%;"></div>
	                            </div>
	                            <div class="step">
	                                <div class="step-icon"><i class="icon-user"></i></div>
	                                <p><?php echo trans("update_profile"); ?></p>
	                            </div>
	                            <div class="step active">
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
		                            <h1 class="step-title"><?php echo trans("contact_informations"); ?></h1>
	                            	<div class="col-sm-12 col-md-12">
		                                <div class="row">
		                                	<div class="row-custom">
							                    <div class="profile-tab-content">
							                        <!-- include message block -->
							                        <?php $this->load->view('partials/_messages'); ?>
							                        <?php echo form_open("profile_controller/contact_informations_post", ['id' => 'form_validate']); ?>
													<input type="hidden" name="cnt" id="cnt" value="<?php echo ("start-selling?req=".$url."&&move=pase"); ?>">
							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans('location'); ?></label>
							                            <div class="row">
							                                <div class="col-12 col-sm-4 m-b-15">
							                                    <div class="selectdiv">
							                                        <select id="countries" name="country_id" class="form-control" onchange="get_states(this.value);" required>
							                                            <option value=""><?php echo trans('country'); ?></option>
							                                            <?php foreach ($countries as $item): ?>
							                                                <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $user->country_id || $item->id == $loc['country_id']) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
							                                            <?php endforeach; ?>
							                                        </select>
							                                    </div>
							                                </div>

							                                <div class="col-12 col-sm-4 m-b-15">
							                                    <div class="selectdiv">
							                                        <select id="states" name="state_id" class="form-control" onchange="get_cities(this.value);" required>
							                                            <option value=""><?php echo trans('state'); ?></option>
							                                            <?php
							                                            if (!empty($states)):
							                                                foreach ($states as $item): ?>
							                                                    <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $user->state_id || $item->id == $loc['state_id']) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
							                                                <?php endforeach;
							                                            endif; ?>
							                                        </select>
							                                    </div>
							                                </div>
							                                <div class="col-12 col-sm-4 m-b-15">
							                                    <div class="selectdiv">
							                                        <select id="cities" name="city_id" class="form-control" required>
							                                            <option value=""><?php echo ('City / L.G.A'); ?></option>
							                                            <?php
							                                            if (!empty($cities)):
							                                                foreach ($cities as $item): ?>
							                                                    <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $user->city_id || $item->id == $loc['city_id']) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
							                                                <?php endforeach;
							                                            endif; ?>
							                                        </select>
							                                    </div>
							                                </div>
							                            </div>

							                            <div class="row">
							                                <div class="col-12 col-sm-6 m-b-sm-15">
							                                    <input type="text" name="address" class="form-control form-input" value="<?php echo html_escape($user->address); ?>" placeholder="<?php echo trans("address") ?>" required>
							                                </div>

							                                <div class="col-12 col-sm-3">
							                                    <input type="text" name="zip_code" class="form-control form-input" value="<?php echo html_escape($user->zip_code); ?>" placeholder="<?php echo trans("zip_code") ?>">
							                                </div>
							                            </div>
							                        </div>

							                        <div class="form-group">
							                            <label class="control-label"><?php echo trans("phone_number"); ?></label>
							                            <input type="text" name="phone_number" class="form-control form-input" value="<?php echo html_escape($user->phone_number); ?>" placeholder="<?php echo trans("phone_number"); ?>" required>
							                        </div>
							                        <div class="form-group m-t-15">
							                            <div class="custom-control custom-checkbox">
							                                <input type="checkbox" name="show_email" value="1" id="checkbox_show_email" class="custom-control-input" <?php echo ($user->show_email == 1) ? 'checked' : ''; ?>>
							                                <label for="checkbox_show_email" class="custom-control-label"><?php echo trans("show_my_email"); ?></label>
							                            </div>
							                        </div>
							                        <div class="form-group">
							                            <div class="custom-control custom-checkbox">
							                                <input type="checkbox" name="show_phone" value="1" id="checkbox_show_phone" class="custom-control-input" <?php echo ($user->show_phone == 1) ? 'checked' : ''; ?>>
							                                <label for="checkbox_show_phone" class="custom-control-label"><?php echo trans("show_my_phone"); ?></label>
							                            </div>
							                        </div>
							                        <div class="form-group m-b-30">
							                            <div class="custom-control custom-checkbox">
							                                <input type="checkbox" name="show_location" value="1" id="checkbox_show_location" class="custom-control-input" <?php echo ($user->show_location == 1) ? 'checked' : ''; ?>>
							                                <label for="checkbox_show_location" class="custom-control-label"><?php echo trans("show_my_location"); ?></label>
							                            </div>
							                        </div>
													<div class="form-group">
											            <a href="<?php echo lang_base_url() . "start-selling?req=".$url; ?>" class="btn btn-success btn-custom float-left">Prev</a>
														<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
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