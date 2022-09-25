<?php
/**
 * Provide a admin area view for the plugin.
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wbcomdesigns.com/plugins
 * @since      1.0.0
 *
 * @package    Ld_Dashboard
 * @subpackage Ld_Dashboard/admin/partials
 */

$function_obj               = Ld_Dashboard_Functions::instance();
$ld_dashboard_settings_data = $function_obj->ld_dashboard_settings_data();
$settings                   = $ld_dashboard_settings_data['zoom_meeting_settings'];
?>
<div class="wbcom-tab-content">
	<div class="wbcom-welcome-main-wrapper">
		<div class="wbcom-admin-title-section">
			<h3><?php esc_html_e( 'Zoom Meeting Settings', 'ld-dashboard' ); ?></h3>
		</div>
		<div class="wbcom-admin-option-wrap wbcom-admin-option-wrap-view">
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php
				settings_fields( 'ld_dashboard_zoom_meeting_settings' );
				do_settings_sections( 'ld_dashboard_zoom_meeting_settings' );
				?>
				<div class="container">
					<div class="ld-grid-view-wrapper Welcome-Message-Pannel form-table">
						<div class="wbcom-settings-section-wrap">
							<div class="ld-grid-label wbcom-settings-section-options-heading" scope="row">
								<label><?php esc_html_e( 'Zoom Api Status', 'ld-dashboard' ); ?></label>
							</div>	
							<div class="ld-grid-content wbcom-settings-section-options">
								<?php
								$status_class = 'zoom-api-inactive';
								$status_icon  = '<span class="dashicons dashicons-dismiss"></span>';
								$status_text  = esc_html__( 'Inactive', 'ld-dashboard' );
								if ( isset( $settings['zoom-api-key'] ) && '' !== $settings['zoom-api-key'] ) {
									$zoom_meeting = new Zoom_Api();
									$response     = $zoom_meeting->get_all_meetings( '?page_size=2&page_number=1' );
									if ( property_exists( $response, 'meetings' ) ) {
										$status_class = 'zoom-api-active';
										$status_icon  = '<span class="dashicons dashicons-yes-alt"></span>';
										$status_text  = esc_html__( 'Active', 'ld-dashboard' );
									}
								}
								?>
								<div class="ld-dashboard-zoom-api-status <?php echo esc_attr( $status_class ); ?>"><?php echo wp_kses_post( $status_icon ); ?></span><?php echo esc_html( $status_text ); ?></div>
							</div>
						</div>
						<div class="wbcom-settings-section-wrap">
							<div class="ld-grid-label wbcom-settings-section-options-heading" scope="row">
								<label><?php esc_html_e( 'Zoom Api Key', 'ld-dashboard' ); ?></label>
							</div>	
							<div class="ld-grid-content wbcom-settings-section-options">
								<input type="text" name="ld_dashboard_zoom_meeting_settings[zoom-api-key]" value="<?php echo ( isset( $settings['zoom-api-key'] ) ) ? esc_attr( $settings['zoom-api-key'] ) : ''; ?>" placeholder="<?php esc_attr_e( 'Enter your zoom api key', 'ld-dashboard' ); ?>" />
							</div>
						</div>
						<div class="wbcom-settings-section-wrap">
							<div class="ld-grid-label wbcom-settings-section-options-heading" scope="row">
								<label><?php esc_html_e( 'Zoom Api Secret', 'ld-dashboard' ); ?></label>
							</div>	
							<div class="ld-grid-content wbcom-settings-section-options">
								<input type="text" name="ld_dashboard_zoom_meeting_settings[zoom-api-secret]" value="<?php echo ( isset( $settings['zoom-api-secret'] ) ) ? esc_attr( $settings['zoom-api-secret'] ) : ''; ?>" placeholder="<?php esc_attr_e( 'Enter your zoom secret key', 'ld-dashboard' ); ?>" />
							</div>
						</div>
						<div class="wbcom-settings-section-wrap">
							<div class="ld-grid-label wbcom-settings-section-options-heading" scope="row">
								<label><?php esc_html_e( 'Zoom Email', 'ld-dashboard' ); ?></label>
							</div>
							<div class="ld-grid-content wbcom-settings-section-options">
								<input type="email" name="ld_dashboard_zoom_meeting_settings[zoom-email]" value="<?php echo ( isset( $settings['zoom-email'] ) ) ? esc_attr( $settings['zoom-email'] ) : ''; ?>" placeholder="<?php esc_attr_e( 'Enter your zoom email', 'ld-dashboard' ); ?>" />
							</div>
						</div>
						<div class="wbcom-settings-section-wrap">
							<div class="ld-grid-label wbcom-settings-section-options-heading" scope="row">
								<label><?php esc_html_e( 'Create meetings using admin account', 'ld-dashboard' ); ?></label>
								<p class="description" id="tagline-description"><?php esc_html_e( 'Allow instructors to create meetings using admin zoom account.', 'ld-dashboard' ); ?></p>
							</div>
							<div class="ld-grid-content wbcom-settings-section-options">
								<input type="checkbox" class="ld-dashboard-setting use-admin-account-checkbox" name="ld_dashboard_zoom_meeting_settings[use-admin-account]" value="1" <?php ( isset( $settings['use-admin-account'] ) ) ? checked( $settings['use-admin-account'], '1' ) : ''; ?> data-id="use-admin-account"/>
							</div>
						</div>
						<div class="wbcom-settings-section-wrap ld-dashboard-instructors-listing">
							<div class="ld-grid-label wbcom-settings-section-options-heading" scope="row">
								<label><?php esc_html_e( 'Zoom Account Co-hosts', 'ld-dashboard' ); ?></label>
								<p class="description" id="tagline-description"><?php esc_html_e( 'You have to select all instructors which you want to start meeting as co-host. If not selected all instructors will start meeting.', 'ld-dashboard' ); ?></p>
							</div>
							<div class="ld-grid-content wbcom-settings-section-options"></div>
						</div>
					</div>
				</div>
				<?php submit_button(); ?>
				<?php wp_nonce_field( 'ld-dashboard-settings-submit', 'ld-dashboard-settings-submit' ); ?>
			</form>
		</div>
	</div>
</div>
