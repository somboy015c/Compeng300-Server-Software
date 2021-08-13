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
	                                <div class="step-progress-line" data-now-value="60" data-number-of-steps="5" style="width: 60%;"></div>
	                            </div>
	                            <div class="step">
	                                <div class="step-icon"><i class="icon-user"></i></div>
	                                <p><?php echo trans("update_profile"); ?></p>
	                            </div>
	                            <div class="step">
	                                <div class="step-icon"><i class="icon-phone"></i></div>
	                                <p><?php echo trans("contact_informations"); ?></p>
	                            </div>
	                            <div class="step active">
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
	                                <h1 class="step-title"><?php echo trans("payout_settings"); ?></h1>
	                                <div class="row">
	                                	<div class="col-sm-12 col-md-12">
							                <?php
							                $active_tab = 'ban'/*$this->session->flashdata('msg_payout')*/;
							                if (empty($active_tab)) {
							                    $active_tab = "ban";
							                }
							                $show_all_tabs = false;
							                ?>
							                <!-- Nav pills -->
							                <ul class="nav nav-pills nav-payout-accounts justify-content-center">
							                    <?php if ($active_tab == "ban"):
							                        $this->load->view('partials/_messages');
							                    endif; ?>
							                    <li class="nav-item" style="padding: 5px;">
							                        <a class="nav-link nav-link-ban <?php echo ($active_tab == 'ban') ? 'active' : ''; ?>" data-toggle="pill" href="#tab_ban"><?php echo ("BAN"); ?></a>
							                    </li>
							                    <?php if ($payment_settings->payout_paypal_enabled): $show_all_tabs = true; ?>
							                        <li class="nav-item" style="padding: 5px;">
							                            <a class="nav-link nav-link-paypal <?php echo ($active_tab == 'paypal') ? 'active' : ''; ?>" data-toggle="pill" href="#tab_paypal"><?php echo trans("paypal"); ?></a>
							                        </li>
							                    <?php endif; ?>
							                    <?php if ($payment_settings->payout_iban_enabled): $show_all_tabs = true; ?>
							                        <li class="nav-item" style="padding: 5px;">
							                            <a class="nav-link nav-link-bank <?php echo ($active_tab == 'iban') ? 'active' : ''; ?>" data-toggle="pill" href="#tab_iban"><?php echo trans("iban"); ?></a>
							                        </li>
							                    <?php endif; ?>
							                    <?php if ($payment_settings->payout_swift_enabled): $show_all_tabs = true; ?>
							                        <li class="nav-item" style="padding: 5px;">
							                            <a class="nav-link nav-link-swift <?php echo ($active_tab == 'swift') ? 'active' : ''; ?>" data-toggle="pill" href="#tab_swift"><?php echo trans("swift"); ?></a>
							                        </li>
							                    <?php endif; ?>
							                </ul>
							                <?php $active_tab_content = 'ban'; ?>
							                <!-- Tab panes -->
							                <?php if ($show_all_tabs): ?>
							                    <div class="tab-content">
							                        <div class="col-sm-12 tab-pane container <?php echo ($active_tab == 'ban') ? 'active' : 'fade'; ?>" id="tab_ban">
							                            <?php echo form_open('earnings_controller/set_ban_payout_account_post', ['id' => 'form_validate_payout_1']); ?>
							                            <input type="hidden" name="cnt" id="cnt" value="<?php echo ("start-selling?req=".$url."&&move=some"); ?>">
							                            <div class="form-group">
							                                <div class="row">
							                                    <div class="col-12 col-md-6 m-b-sm-15">
							                                        <label><?php echo trans("bank_account_holder_name"); ?>*</label>
							                                        <input type="text" name="ban_bank_account_holder_name" class="form-control form-input" value="<?php echo html_escape($user_payout->ban_bank_account_holder_name); ?>" required>
							                                    </div>
							                                    <div class="col-12 col-md-6">
							                                        <label><?php echo trans("bank_name"); ?>*</label>
							                                        <input type="text" name="ban_bank_name" class="form-control form-input" value="<?php echo html_escape($user_payout->ban_bank_name); ?>" required>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="form-group">
							                                <div class="row">
							                                    <div class="col-12 col-md-6 m-b-sm-15">
							                                        <label><?php echo trans("bank_branch_country"); ?>*</label>
							                                        <div class="selectdiv">
							                                            <select name="ban_bank_branch_country_id" class="form-control" required>
							                                                <option value="" selected><?php echo trans("select_country"); ?></option>
							                                                <?php foreach ($countries as $item): ?>
							                                                    <option value="<?php echo $item->id; ?>" <?php echo ($user_payout->ban_bank_branch_country_id == $item->id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
							                                                <?php endforeach; ?>
							                                            </select>
							                                        </div>
							                                    </div>
							                                    <div class="col-12 col-md-6">
							                                        <label><?php echo ("Bank Account Number"); ?>*</label>
							                                        <input type="text" name="ban_number" class="form-control form-input" value="<?php echo html_escape($user_payout->ban_number); ?>" required>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="form-group">
															<a href="<?php echo lang_base_url() . "start-selling?req=".$url."&&move=coin"; ?>" class="btn btn-success btn-custom float-left">Prev</a>
															<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("next"); ?></button>
														</div>
							                            <?php echo form_close(); ?>
							                        </div>
							                        <div class="col-sm-6 tab-pane container <?php echo ($active_tab == 'paypal') ? 'active' : 'fade'; ?>" id="tab_paypal">

							                            <?php if ($active_tab == "paypal"):
							                                $this->load->view('partials/_messages');
							                            endif; ?>

							                            <?php echo form_open('earnings_controller/set_paypal_payout_account_post', ['id' => 'form_validate_payout_1']); ?>
							                            <input type="hidden" name="cnt" id="cnt" value="<?php echo ("start-selling?req=".$url."&&move=some"); ?>">
							                            <div class="form-group">
							                                <label><?php echo trans("paypal_email_address"); ?>*</label>
							                                <input type="email" name="payout_paypal_email" class="form-control form-input" value="<?php echo html_escape($user_payout->payout_paypal_email); ?>" required>
							                            </div>
							                            <div class="form-group">
															<a href="<?php echo lang_base_url() . "start-selling?req=".$url."&&move=coin"; ?>" class="btn btn-success btn-custom float-left">Prev</a>
															<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("next"); ?></button>
														</div>
							                            <?php echo form_close(); ?>
							                        </div>
							                        <div class="col-sm-12 tab-pane container <?php echo ($active_tab == 'iban') ? 'active' : 'fade'; ?>" id="tab_iban">

							                            <?php if ($active_tab == "iban"):
							                                $this->load->view('partials/_messages');
							                            endif; ?>

							                            <?php echo form_open('earnings_controller/set_iban_payout_account_post', ['id' => 'form_validate_payout_2']); ?>
							                            <input type="hidden" name="cnt" id="cnt" value="<?php echo ("start-selling?req=".$url."&&move=some"); ?>">
							                            <div class="form-group">
							                                <label><?php echo trans("full_name"); ?>*</label>
							                                <input type="text" name="iban_full_name" class="form-control form-input" value="<?php echo html_escape($user_payout->iban_full_name); ?>" required>
							                            </div>
							                            <div class="form-group">
							                                <div class="row">
							                                    <div class="col-12 col-md-6 m-b-sm-15">
							                                        <label><?php echo trans("country"); ?>*</label>
							                                        <div class="selectdiv">
							                                            <select name="iban_country_id" class="form-control" required>
							                                                <option value="" selected><?php echo trans("select_country"); ?></option>
							                                                <?php foreach ($countries as $item): ?>
							                                                    <option value="<?php echo $item->id; ?>" <?php echo ($user_payout->iban_country_id == $item->id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
							                                                <?php endforeach; ?>
							                                            </select>
							                                        </div>
							                                    </div>
							                                    <div class="col-12 col-md-6">
							                                        <label><?php echo trans("bank_name"); ?>*</label>
							                                        <input type="text" name="iban_bank_name" class="form-control form-input" value="<?php echo html_escape($user_payout->iban_bank_name); ?>" required>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="form-group">
							                                <label><?php echo trans("iban_long"); ?>(<?php echo trans("iban"); ?>)*</label>
							                                <input type="text" name="iban_number" class="form-control form-input" value="<?php echo html_escape($user_payout->iban_number); ?>" required>
							                            </div>
							                            <div class="form-group">
															<a href="<?php echo lang_base_url() . "start-selling?req=".$url."&&move=coin"; ?>" class="btn btn-success btn-custom float-left">Prev</a>
															<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("next"); ?></button>
														</div>
							                            <?php echo form_close(); ?>
							                        </div>
							                        <div class="col-sm-12 tab-pane container <?php echo ($active_tab == 'swift') ? 'active' : 'fade'; ?>" id="tab_swift">

							                            <?php if ($active_tab == "swift"):
							                                $this->load->view('partials/_messages');
							                            endif; ?>

							                            <?php echo form_open('earnings_controller/set_swift_payout_account_post', ['id' => 'form_validate_payout_3']); ?>
							                            <input type="hidden" name="cnt" id="cnt" value="<?php echo ("start-selling?req=".$url."&&move=some"); ?>">
							                            <div class="form-group">
							                                <label><?php echo trans("full_name"); ?>*</label>
							                                <input type="text" name="swift_full_name" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_full_name); ?>" required>
							                            </div>
							                            <div class="form-group">
							                                <div class="row">
							                                    <div class="col-12 col-md-6 m-b-sm-15">
							                                        <label><?php echo trans("country"); ?>*</label>
							                                        <div class="selectdiv">
							                                            <select name="swift_country_id" class="form-control" required>
							                                                <option value="" selected><?php echo trans("select_country"); ?></option>
							                                                <?php foreach ($countries as $item): ?>
							                                                    <option value="<?php echo $item->id; ?>" <?php echo ($user_payout->swift_country_id == $item->id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
							                                                <?php endforeach; ?>
							                                            </select>
							                                        </div>
							                                    </div>
							                                    <div class="col-12 col-md-6">
							                                        <label><?php echo trans("state"); ?>*</label>
							                                        <input type="text" name="swift_state" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_state); ?>" required>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="form-group">
							                                <div class="row">
							                                    <div class="col-12 col-md-6 m-b-sm-15">
							                                        <label><?php echo trans("city"); ?>*</label>
							                                        <input type="text" name="swift_city" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_city); ?>" required>
							                                    </div>
							                                    <div class="col-12 col-md-6">
							                                        <label><?php echo trans("postcode"); ?>*</label>
							                                        <input type="text" name="swift_postcode" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_postcode); ?>" required>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="form-group">
							                                <label><?php echo trans("address"); ?>*</label>
							                                <input type="text" name="swift_address" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_address); ?>" required>
							                            </div>
							                            <div class="form-group">
							                                <div class="row">
							                                    <div class="col-12 col-md-6 m-b-sm-15">
							                                        <label><?php echo trans("bank_account_holder_name"); ?>*</label>
							                                        <input type="text" name="swift_bank_account_holder_name" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_bank_account_holder_name); ?>" required>
							                                    </div>
							                                    <div class="col-12 col-md-6">
							                                        <label><?php echo trans("bank_name"); ?>*</label>
							                                        <input type="text" name="swift_bank_name" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_bank_name); ?>" required>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="form-group">
							                                <div class="row">
							                                    <div class="col-12 col-md-6 m-b-sm-15">
							                                        <label><?php echo trans("bank_branch_country"); ?>*</label>
							                                        <div class="selectdiv">
							                                            <select name="swift_bank_branch_country_id" class="form-control" required>
							                                                <option value="" selected><?php echo trans("select_country"); ?></option>
							                                                <?php foreach ($countries as $item): ?>
							                                                    <option value="<?php echo $item->id; ?>" <?php echo ($user_payout->swift_bank_branch_country_id == $item->id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
							                                                <?php endforeach; ?>
							                                            </select>
							                                        </div>
							                                    </div>
							                                    <div class="col-12 col-md-6">
							                                        <label><?php echo trans("bank_branch_city"); ?>*</label>
							                                        <input type="text" name="swift_bank_branch_city" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_bank_branch_city); ?>" required>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="form-group">
							                                <label><?php echo trans("swift_iban"); ?>*</label>
							                                <input type="text" name="swift_iban" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_iban); ?>" required>
							                            </div>
							                            <div class="form-group">
							                                <label><?php echo trans("swift_code"); ?>*</label>
							                                <input type="text" name="swift_code" class="form-control form-input" value="<?php echo html_escape($user_payout->swift_code); ?>" required>
							                            </div>
							                           <div class="form-group">
															<a href="<?php echo lang_base_url() . "start-selling?req=".$url."&&move=coin"; ?>" class="btn btn-success btn-custom float-left">Prev</a>
															<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("next"); ?></button>
														</div>
							                            <?php echo form_close(); ?>
							                        </div>
							                    </div>
							                <?php endif; ?>
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