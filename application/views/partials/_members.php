<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($member->role != 'member'): ?>

    <?php if (strpos($member->shop_plan, 'holesaler') != false) {$color = "wholesaler_color"; } elseif (strpos($member->shop_plan, 'etailer') != false) {$color = "retailer_color"; } elseif (strpos($member->shop_plan, 'anufacturer') != false) { $color = "manufacturer_color"; }  ?>

                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="row-custom">
                                            <label class="" style="font-size: 18px; margin: 0px;"><p class="username" style=" margin: 0px;"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 13) {
                                            echo substr(get_shop_name($member), 0, 12) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                                    <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                        <i class="icon-verified icon-verified-member" style="margin-left: 0px; float: none;"></i>
                                                    <?php endif; ?>
                                            </p></label>
                                            <label class="btn btn-sm btn-profile-option" style="border-radius: 3px; float: right; vertical-align: middle; background-color: <?php echo $this->general_settings->$color; ?>; color: white; font-weight: 600; padding-top: 2px; padding-bottom: 2px;">Shop</label>
                                        </div>

                                            

                                        <div class="row-custom">
                                            <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>
                                            <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 32) {
                                            echo substr(html_escape($shop_cat), 0, 30) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        </div>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="" style="float: left;">
                                               <label class="lbl" style="margin-bottom: 0px;color: <?php echo $this->general_settings->$color; ?>; font-size: 16px; font-weight: 600; line-height: 22px;"><?php if (strpos($member->shop_plan, 'holesaler') != false) { echo "Wholesaler"; } elseif (strpos($member->shop_plan, 'etailer') != false) { echo "Retailer"; } elseif (strpos($member->shop_plan, 'anufacturer') != false) { echo "Manufacturer"; }  ?></label>
                                            </div>
                                            <div class="" style="float: right;">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>

<?php else: ?>


                                <?php if (strpos($member->workshop_plan, 'asic') != false) { $color = "basic_color"; } elseif (strpos($member->workshop_plan, 'remium') != false) { $color = "premium_color"; } elseif (strpos($member->workshop_plan, 'ltimate') != false) { $color = "ultimate_color"; }  ?>
                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_wshop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="row-custom">
                                            <label class="" style="font-size: 18px; margin: 0px;"><p class="username" style=" margin: 0px;"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 13) {
                                            echo substr(get_shop_name($member), 0, 12) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                                    <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                        <i class="icon-verified icon-verified-member" style="margin-left: 0px; float: none;"></i>
                                                    <?php endif; ?>
                                            </p></label>
                                            <label class="btn btn-sm btn-profile-option" style="border-radius: 3px; float: right; vertical-align: middle; background-color: <?php echo $this->general_settings->$color; ?>; color: white; font-weight: 600; padding-top: 2px; padding-bottom: 2px;">Workshop</label>
                                        </div>

                                            

                                        <div class="row-custom">
                                            <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Workshop'; ?>
                                            <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 32) {
                                            echo substr(html_escape($shop_cat), 0, 30) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        </div>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="" style="float: left;">
                                               <label class="lbl" style="margin-bottom: 0px;color: <?php echo $this->general_settings->$color; ?>; font-size: 16px; font-weight: 600; line-height: 22px;"><?php if (strpos($member->workshop_plan, 'asic') != false) { echo "Basic"; } elseif (strpos($member->workshop_plan, 'remium') != false) { echo "Premium"; } elseif (strpos($member->workshop_plan, 'ltimate') != false) { echo "Ultimate"; }  ?></label>
                                            </div>
                                            <div class="" style="float: right;">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>
<?php endif; ?>