<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($general_settings->selected_navigation == 1): ?>
	<div class="container" style="padding: 0px; margin: 0px; width: 100% !important; ">
		<hr style="margin-top: 0px; margin-bottom: 0px;">
		<div class="navbar-light navbar-expand" style="padding: 0px; margin: 0px;">
				<div class="row">
					<div class="col-10">
						<div class="nav-mobile-inner">
							<ul class="navbar-nav">
								<div class="col-12"style="padding: 0px; margin: 0px;">
									<div class="row-custom"style="padding: 0px; margin: 0px;">
										<div id="blog-slider2" class="owl-carousel2 blog-slider" style="max-height: 40px;">
									    <!--print blog slider posts-->
										<?php if (!empty($parent_categories)): $cat_count = count($parent_categories); $count = 1;
											foreach ($parent_categories as $key => $category): ?>
									        <div class="blog-item">
									        	<ul class="navbar-nav">
													<?php $subcategories = get_subcategories_by_parent_id($category->id);
													if (empty($subcategories)):?>
														<li class="nav-item" style="overflow: hidden;">
															<a href="<?php echo generate_category_url($category); ?>" class="nav-link"><?php echo html_escape(get_category_name_by_lang($category->id, $this->selected_lang->id)); ?></a>
														</li>
													<?php else: ?>
															<a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="overflow: hidden;">
																<?php echo html_escape(get_category_name_by_lang($category->id, $this->selected_lang->id)); ?>
															</a>
															<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="position: fixed;display: all;box-sizing: border-box;background: #fff;transition: all 300ms ease;-moz-transition: all 300ms ease;-ms-transition: all 300ms ease;-o-transition: all 300ms ease;animation: 0.9s ease 0s running fixedAnim;-webkit-animation: 0.9s ease 0s running fixedAnim;-moz-animation: 0.9s ease 0s running fixedAnim;-o-animation: 0.9s ease 0s running fixedAnim;">
																<a class="dropdown-item" href="<?php echo generate_category_url($category); ?>"><?php echo trans("all"); ?></a>
																<?php foreach ($subcategories as $subcategory): ?>
																	<a class="dropdown-item" href="<?php echo generate_category_url($subcategory); ?>"><?php echo html_escape($subcategory->name); ?></a>
																<?php endforeach; ?>
															</div>
													<?php endif;
													$count++; ?>
												</ul>
											</div>
											<?php endforeach;
										endif; ?>
										</div>
									</div>
								</div>
							</ul>
						</div>
					</div>
					<div class="col-2" style="margin: 0px; padding: 0px; background-color: white; z-index: 1;">
						<?php $num_len = strlen($default_state); if ($general_settings->default_product_location == 0): ?>
							<div class="region-left">
								<div class="row-custom footer-location" style="max-height: 40px;">
									<div class="dropdown">
									<div class="icon-text">
										<i class="icon-map-marker"></i>
									</div>
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="background-color: white !important; border-radius: 6px; <?php if ($default_state != "All States" && $default_location != 'All') {echo 'padding-left: 7px;';} ?>">
											<?php if ($num_len > 4) {echo substr($default_state, 0, 3) . "..";} else { echo $default_state;} ?><span class="icon-arrow-down"></span>
										</button>
										<div class="dropdown-menu">
											<?php if (!empty($statess)): ?>
											<a class="dropdown-item" href="javascript:void(0)" onclick="set_default_state('all');"><?php echo ("All States"); ?></a>
											<?php foreach ($statess as $item): ?>
												<a class="dropdown-item" href="javascript:void(0)" onclick="set_default_state('<?php echo $item->id; ?>');"><?php echo html_escape($item->name); ?></a>
											<?php endforeach;
											else: if ($default_location == 'All'): ?>
												<p style="padding-left: 10px; padding-right: 10px; color: red;">Please Select your country at the bottom of this page to browse through updates from your nearest community and your state here.</p>
											<?php else: ?>
												<p style="padding-left: 10px; padding-right: 10px; color: red;">States unavailable for this country, Please Select another available country.</p>
											<?php endif; endif; ?>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
		</div>
	</div>
<?php else: ?>
	<div class="container">
		<div class="navbar navbar-light navbar-expand">
			<ul class="nav navbar-nav mega-menu">
				<?php
				$limit = $general_settings->menu_limit;
				$menu_item_count = 1;
				if (!empty($parent_categories)):
					foreach ($parent_categories as $category):
						if ($menu_item_count <= $limit):?>
							<li class="nav-item dropdown" data-category-id="<?php echo $category->id; ?>">
								<a href="<?php echo generate_category_url($category); ?>" class="nav-link dropdown-toggle">
									<?php echo html_escape(get_category_name_by_lang($category->id, $this->selected_lang->id)); ?>
								</a>
								<?php $subcategories = get_subcategories_by_parent_id($category->id);
								if (!empty($subcategories)):?>
									<div id="mega_menu_content_<?php echo $category->id; ?>" class="dropdown-menu dropdown-menu-large">
										<div class="row">

											<div class="col-4 left">
												<?php
												$count = 0;
												foreach ($subcategories as $subcategory): ?>
													<div class="large-menu-item <?php echo ($count == 0) ? 'large-menu-item-first active' : ''; ?>" data-subcategory-id="<?php echo $subcategory->id; ?>">
														<a href="<?php echo generate_category_url($subcategory); ?>" class="second-category">
															<?php echo html_escape($subcategory->name); ?>
															<i class="icon-arrow-right"></i>
														</a>
													</div>
													<?php
													$count++;
												endforeach; ?>
											</div>

											<div class="col-8 right">
												<?php
												$count = 0;
												foreach ($subcategories as $subcategory): ?>
													<div id="large_menu_content_<?php echo $subcategory->id; ?>" class="large-menu-content <?php echo ($count == 0) ? 'large-menu-content-first active' : ''; ?>">
														<?php $third_categories = get_subcategories_by_parent_id($subcategory->id);
														if (!empty($third_categories)): ?>
															<div class="row">
																<?php foreach ($third_categories as $item): ?>
																	<div class="col-4 item-large-menu-content">
																		<a href="<?php echo generate_category_url($item); ?>"><?php echo html_escape($item->name); ?></a>
																	</div>
																<?php endforeach; ?>
															</div>
														<?php endif; ?>
													</div>
													<?php
													$count++;
												endforeach; ?>
											</div>

										</div>
									</div>
								<?php endif; ?>
							</li>
							<?php $menu_item_count++;
						endif;
					endforeach;

					if (count($parent_categories) > $limit): ?>
						<li class="nav-item dropdown menu-li-more">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo trans("more"); ?></a>
							<div class="dropdown-menu dropdown-menu-more-items">
								<?php
								$menu_item_count = 1;
								if (!empty($parent_categories)):
									foreach ($parent_categories as $category):
										if ($menu_item_count > $limit): ?>
											<a href="<?php echo generate_category_url($category); ?>" class="dropdown-item">
												<?php echo html_escape(get_category_name_by_lang($category->id, $this->selected_lang->id)); ?>
											</a>
										<?php endif;
										$menu_item_count++;
									endforeach;
								endif; ?>
							</div>
						</li>
					<?php endif;
				endif; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>



