<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
 * Get User loggedin wise courses from LearnDash Dashboard course report template file
 * Get User loggedin wise Students from LearnDash Dashboard students status template file
 */
global $courses, $students, $wpdb;
$curr_user_id = $user_id = get_current_user_id();
$curr_user    = wp_get_current_user();
if ( empty( $courses ) ) {
	if ( learndash_is_admin_user() ) {
		$args = array(
			'post_type'      => 'sfwd-courses',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);
	} elseif ( learndash_is_group_leader_user() && ! in_array( 'ld_instructor', $curr_user->roles ) ) {
		$group_course = learndash_get_group_leader_groups_courses();

		$args = array(
			'post_type'      => 'sfwd-courses',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'post__in'       => ( ! empty( $group_course ) ) ? $group_course : array( 0 ),
		);
	} elseif ( in_array( 'ld_instructor', $curr_user->roles ) ) {
		$courses    = Ld_Dashboard_Public::get_instructor_courses_list();
		$course_ids = array( 0 );
		if ( ! empty( $courses ) ) {
			$course_ids = array();
			foreach ( $courses as $course ) {
				$course_ids[] = $course->ID;
			}
		}
		$args = array(
			'post_type'      => 'sfwd-courses',
			'post__in'       => $course_ids,
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);
	}

	$courses = get_posts( $args );
}


if ( empty( $student ) ) {
	if ( learndash_is_group_leader_user() && ! in_array( 'ld_instructor', $curr_user->roles ) ) {
		$group_student = learndash_get_group_leader_groups_users();
		$args          = array(
			'meta_key' => 'course_%_access_from',
			'orderby'  => 'user_nicename',
			'order'    => 'ASC',
			'fields'   => array( 'ID', 'display_name' ),
			'include'  => ( ! empty( $group_student ) ) ? $group_student : array( 0 ),
		);

	} elseif ( learndash_is_admin_user() ) {
		$args = array(
			'meta_key' => 'course_%_access_from',
			'orderby'  => 'user_nicename',
			'order'    => 'ASC',
			'fields'   => array( 'ID', 'display_name' ),
		);
	} elseif ( in_array( 'ld_instructor', $curr_user->roles ) ) {
		$instructor_students = $this->ld_dashboard_get_instructor_students_by_id( $curr_user_id );
		$course_student_ids  = array( 0 );
		if ( ! empty( $instructor_students ) ) {
			$course_student_ids = array();
			foreach ( $instructor_students as $key => $course_student ) {
				$course_student_ids[] = $course_student->ID;
			}
		}

		if ( learndash_is_group_leader_user() ) {
			$group_student      = learndash_get_group_leader_groups_users();
			$course_student_ids = array_merge( $course_student_ids, $group_student );
			$course_student_ids = array_unique( $course_student_ids );
		}

		$args = array(
			'orderby' => 'user_nicename',
			'order'   => 'ASC',
			'fields'  => array( 'ID', 'display_name' ),
			'include' => $course_student_ids,
		);
	}
	add_action( 'pre_user_query', 'ld_dashboard_user_queries' );
	$students = get_users( $args );
	remove_action( 'pre_user_query', 'ld_dashboard_user_queries' );
}



$get_groups = array();

if ( learndash_is_group_leader_user() ) {
	$get_groups = learndash_get_administrators_group_ids( $curr_user_id );
} elseif ( learndash_is_admin_user() ) {
	$sql_str       = $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = %s AND post_status = %s', 'groups', 'publish' );
	$group_courses = $wpdb->get_results( $sql_str );
	if ( ! empty( $group_courses ) ) {
		foreach ( $group_courses as $index => $group ) {
			$get_groups[] = $group->ID;
		}
	}
} else {
	$get_groups = learndash_get_administrators_group_ids( $curr_user_id );
}
?>


<div id="ld-dashboard-email" class="ld-dashboard-email ld-dashboard-email-section">
	<div class="ld-dashboard-section-head-title">
		<h3 class="ld-dashboard-nav-title"><?php esc_html_e( 'Email', 'ld-dashboard' ); ?></h3>
	</div>
	<div class="ld-dashboard-email-content">
	<?php do_action( 'ld_dashboard_before_email_form' ); ?>
		<form id="ld-dashboard-email-frm" action="" method="post">
			<?php if ( ! empty( $get_groups ) ) : ?>
				<fieldset>
					<select name="ld-email-groups[]" id="ld-email-groups" class="ld-dashboard-select" data-placeholder="<?php printf( esc_html__( 'Select %s', 'ld-dashboard' ), esc_html( LearnDash_Custom_Label::get_label( 'groups' ) ) ); ?>">
						<option value=""><?php printf( esc_html__( 'Select %s', 'ld-dashboard' ), esc_html( LearnDash_Custom_Label::get_label( 'groups' ) ) ); ?></option>
						<?php foreach ( $get_groups as $group ) { ?>
							<option value="<?php echo esc_attr( $group ); ?>">
								<?php echo get_the_title( $group ); ?>
							</option>
						<?php } ?>
					</select>
				</fieldset>
			<?php endif; ?>
			<fieldset>
				<select name="ld-email-cource[]" multiple id="ld-email-cource" class="ld-dashboard-select" data-placeholder="<?php printf( esc_html__( 'Select %s', 'ld-dashboard' ), esc_html( LearnDash_Custom_Label::get_label( 'course' ) ) ); ?>">
					<?php foreach ( $courses as $index => $course ) { ?>
						<option value="<?php echo esc_attr( $course->ID ); ?>">
							<?php echo esc_html( $course->post_title ); ?>
						</option>
					<?php } ?>
				</select>
				<span id="ld-email-cource-loader" style="display:none;"><img src="<?php echo esc_url( LD_DASHBOARD_PLUGIN_URL ) . 'public/img/wpspin-2x.gif'; ?>" /></span>
			</fieldset>

			<fieldset class="ld-email-course-students">
				<label>
					<input type="checkbox" id="ld-email-course-students-checkbox" >
					<?php esc_html_e( 'Select All Students', 'ld-dashboard' ); ?>
				</label>
				<select name="ld-email-students[]" multiple id="ld-email-students" class="ld-dashboard-select ld-dashboard-email-course-students" data-placeholder="<?php esc_html_e( 'Select Students', 'ld-dashboard' ); ?>">
					<?php foreach ( $students as $student ) { ?>
						<option value="<?php echo esc_attr( $student->ID ); ?>" ><?php echo esc_html( $student->display_name ); ?></option>
					<?php } ?>
				</select>
				<span id="ld-email-student-loader" style="display:none;"><img src="<?php echo esc_url( LD_DASHBOARD_PLUGIN_URL ) . 'public/img/wpspin-2x.gif'; ?>" /></span>
			</fieldset>

			<fieldset>
				<input type="text" name="ld-email-subject" value="" placeholder="<?php esc_html_e( 'Please enter email subject', 'ld-dashboard' ); ?>" id="ld-email-subject" class="ld-email-text"/>
			</fieldset>

			<fieldset>
				<?php
				$args = array(
					'media_buttons' => false,
					'editor_height' => 200,
					'tinymce'       => array(
						'toolbar1' => 'bold,italic,strikethrough,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker,wp_adv',
						'toolbar2' => '',
					),
				);
				wp_editor( '', 'ld-email-message', $args );
				?>
			</fieldset>

			<fieldset>
				<button name="submit" id="ld-email-send" class="ld_email_send ld-dashboard-btn-bg" ><?php esc_html_e( 'Send Email', 'ld-dashboard' ); ?></button>
				<span id="ld-email-loader" style="display:none;"><img src="<?php echo esc_url( LD_DASHBOARD_PLUGIN_URL ) . 'public/img/wpspin-2x.gif'; ?>" /></span>
			</fieldset>
		</form>
		<?php do_action( 'ld_dashboard_after_email_form' ); ?>
	</div>

</div>
