<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Custom_Learndash
 * @subpackage Custom_Learndash/public
 * @author     Wbcom Designs <admin@wbcomdesigns.com>
 */
class Ld_Dashboard_Register_Lesson_Group_Fields {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		if ( function_exists( 'acf_add_local_field_group' ) ) :
			$course_label = LearnDash_Custom_Label::get_label( 'course' );
			$lesson_label = LearnDash_Custom_Label::get_label( 'lesson' );
			$fields       = array(
				array(
					'key'                         => 'field_61b6f86826e91',
					'label'                       => $lesson_label . esc_html__( ' Title', 'ld-dashboard' ),
					'name'                        => 'ldd_post_title',
					'type'                        => 'text',
					'instructions'                => '',
					'required'                    => 1,
					'conditional_logic'           => 0,
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form ld-dashboard-form-post-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'readonly'                    => 0,
					'default_value'               => '',
					'placeholder'                 => '',
					'prepend'                     => '',
					'append'                      => '',
					'maxlength'                   => '',
				),
				array(
					'key'                         => 'field_61b6fae326e92',
					'label'                       => $lesson_label . esc_html__( ' Status', 'ld-dashboard' ),
					'name'                        => 'ldd_lesson_status',
					'type'                        => 'radio',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => 0,
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form ld-dashboard-form-post-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'choices'                     => array(
						'publish' => 'Publish',
						'pending' => 'Pending',
						'draft'   => 'Draft',
					),
					'allow_null'                  => 0,
					'other_choice'                => 0,
					'default_value'               => '',
					'layout'                      => 'horizontal',
					'return_format'               => 'value',
					'save_other_choice'           => 0,
				),
				array(
					'key'                         => 'field_61b6fbb326e93',
					'label'                       => $lesson_label . esc_html__( ' Content', 'ld-dashboard' ),
					'name'                        => 'ldd_post_content',
					'type'                        => 'wysiwyg',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => 0,
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form ld-dashboard-form-post-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'readonly'                    => 0,
					'default_value'               => '',
					'tabs'                        => 'all',
					'toolbar'                     => 'full',
					'media_upload'                => 1,
				),
				array(
					'key'               => 'field_61fceqweqwqqe',
					'label'             => esc_html__( 'Featured Image', 'ld-dashboard' ),
					'name'              => '_thumbnail_id',
					'type'              => 'image',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => 'custom-learndash-course-form add-course-featured-img ld-dashboard-form-post-data-tab',
						'id'    => '',
					),
					'return_format'     => 'id',
					'preview_size'      => 'medium',
					'library'           => 'uploadedTo',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => '',
				),
				array(
					'key'                         => 'field_61b6fc0726e94',
					'label'                       => $lesson_label . esc_html__( ' Materials', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_materials_enabled_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => 0,
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'message'                     => sprintf( esc_html__( 'Any content added below is displayed on the %s page', 'ld-dashboard' ), $lesson_label ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b6fca926e95',
					'label'                       => esc_html__( 'Material', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_materials_cld',
					'type'                        => 'wysiwyg',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fc0726e94',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-sub-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'default_value'               => '',
					'tabs'                        => 'all',
					'toolbar'                     => 'full',
					'media_upload'                => 1,
					'delay'                       => 0,
				),
				array(
					'key'                         => 'field_61b6fe3b26e96',
					'label'                       => esc_html__( 'Video Progression', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_enabled_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b7040e26ea0',
								'operator' => '!=',
								'value'    => '1',
							),
							array(
								'field'    => 'field_61b7204fbf8a6',
								'operator' => '!=',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'message'                     => 'Require users to watch the full video as part of the course progression. Use shortcode [ld_video] to move within the post content.',
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b7001e26e97',
					'label'                       => esc_html__( 'Video Url', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_url_cld',
					'type'                        => 'url',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-sub-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'default_value'               => '',
					'placeholder'                 => '',
				),
				array(
					'key'                         => 'field_61b7009526e98',
					'label'                       => esc_html__( 'Display Timing', 'ld-dashboard' ),
					'name'                        => 'text',
					'type'                        => 'radio',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-sub-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'choices'                     => array(
						'before_completed_sub_steps' => esc_html__( 'Before completed sub-steps', 'ld-dashboard' ),
						'after_completing_sub_steps' => esc_html__( 'After completing sub-steps', 'ld-dashboard' ),
					),
					'allow_null'                  => 0,
					'other_choice'                => 0,
					'default_value'               => '',
					'layout'                      => 'vertical',
					'return_format'               => 'value',
					'save_other_choice'           => 0,
				),
				array(
					'key'                         => 'field_61b700e526e99',
					'label'                       => $lesson_label . esc_html__( ' Auto-Completion', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_auto_complete',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b7009526e98',
								'operator' => '==',
								'value'    => 'after_completing_sub_steps',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-sub-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'message'                     => sprintf( esc_html__( 'Automatically mark the %s as completed once the user has watched the full video.', 'ld-dashboard' ), strtolower( $lesson_label ) ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b7013626e9a',
					'label'                       => 'Completion Delay',
					'name'                        => 'sfwd-lessons_lesson_video_auto_complete_delay_cld',
					'type'                        => 'number',
					'instructions'                => sprintf( esc_html__( 'Specify a delay between video completion and %s completion.', 'ld-dashboard' ), strtolower( $lesson_label ) ),
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b7009526e98',
								'operator' => '==',
								'value'    => 'after_completing_sub_steps',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-completion-delay custom-learndash-course-sub-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'readonly'                    => 0,
					'default_value'               => '',
					'placeholder'                 => '',
					'prepend'                     => '',
					'append'                      => '10 seconds',
					'min'                         => '',
					'max'                         => '',
					'step'                        => '',
				),
				array(
					'key'                         => 'field_61b7017c26e9b',
					'label'                       => esc_html__( 'Mark Complete Button', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_show_complete_button',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b7009526e98',
								'operator' => '==',
								'value'    => 'after_completing_sub_steps',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab custom-learndash-course-sub-form',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'message'                     => sprintf( esc_html__( 'Display the Mark Complete button on a %s even if not yet clickable.', 'ld-dashboard' ), strtolower( $lesson_label ) ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b701b626e9c',
					'label'                       => esc_html__( 'Autostart', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_auto_start_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab custom-learndash-course-sub-form',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'message'                     => esc_html__( 'Note, due to browser requirements videos will be automatically muted for autoplay to work.', 'ld-dashboard' ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b701ea26e9d',
					'label'                       => esc_html__( 'Video Control Display', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_show_controls_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab custom-learndash-course-sub-form',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'message'                     => esc_html__( 'Users can pause, move backward and forward within the video.', 'ld-dashboard' ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b7037426e9e',
					'label'                       => esc_html__( 'Video Pause on Window Unfocused', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_focus_pause_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab custom-learndash-course-sub-form',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'message'                     => esc_html__( 'Pause the video if user switches to a different window. VooPlayer not supported.', 'ld-dashboard' ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b703d526e9f',
					'label'                       => esc_html__( 'Video Resume', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_video_track_time_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab custom-learndash-course-form custom-learndash-course-sub-form',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'message'                     => esc_html__( 'Allows user to resume video position. Uses browser cookie. VooPlayer not supported.', 'ld-dashboard' ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b7040e26ea0',
					'label'                       => esc_html__( 'Assignment Uploads', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_lesson_assignment_upload_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '!=',
								'value'    => '1',
							),
							array(
								'field'    => 'field_61b7204fbf8a6',
								'operator' => '!=',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'message'                     => esc_html__( 'Enable assignment uploads.', 'ld-dashboard' ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b71f7d26ea6',
					'label'                       => esc_html__( 'Grading Type', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_auto_approve_assignment_cld',
					'type'                        => 'radio',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b7040e26ea0',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab custom-learndash-course-sub-form',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'choices'                     => array(
						'on' => esc_html__( 'Auto-approve (No grading or approval needed. The assignment will be automatically approved and full points will be awarded.)', 'ld-dashboard' ),
						''   => sprintf( esc_html__( 'Manually grade (Admin or Group leader approval and grading required. The %s cannot be completed until the assignment is approved.)', 'ld-dashboard' ), strtolower( $lesson_label ) ),
					),
					'allow_null'                  => 0,
					'other_choice'                => 0,
					'default_value'               => '',
					'layout'                      => 'vertical',
					'return_format'               => 'value',
					'save_other_choice'           => 0,
				),
				array(
					'key'                         => 'field_61b7204fbf8a6',
					'label'                       => sprintf( esc_html__( 'Forced %s Timer', 'ld-dashboard' ), $lesson_label ),
					'name'                        => 'sfwd-lessons_forced_lesson_time_enabled_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b6fe3b26e96',
								'operator' => '!=',
								'value'    => '1',
							),
							array(
								'field'    => 'field_61b7040e26ea0',
								'operator' => '!=',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'message'                     => sprintf( esc_html__( 'The %s cannot be marked as completed until the set time has elapsed.', 'ld-dashboard' ), strtolower( $lesson_label ) ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b72091bf8a8',
					'label'                       => sprintf( esc_html__( 'Forced %s time', 'ld-dashboard' ), $lesson_label ),
					'name'                        => 'sfwd-lessons_forced_lesson_time_cld',
					'type'                        => 'time_picker',
					'instructions'                => sprintf( esc_html__( 'The %s cannot be marked as completed until the set time has elapsed.', 'ld-dashboard' ), strtolower( LearnDash_Custom_Label::get_label( 'lesson' ) ) ),
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b7204fbf8a6',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab custom-learndash-course-sub-form ldd-hide-label',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'display_format'              => 'H:i:s',
					'return_format'               => 'H:i:s',
				),
				array(
					'key'                         => 'field_61b720eebf8a9',
					'label'                       => sprintf( esc_html__( 'Associated %s', 'ld-dashboard' ), $course_label ),
					'name'                        => 'sfwd-lessons_course',
					'type'                        => 'post_object',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => 0,
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'post_type'                   => array(
						0 => 'sfwd-courses',
					),
					'taxonomy'                    => '',
					'allow_null'                  => 0,
					'multiple'                    => 0,
					'return_format'               => 'id',
					'ui'                          => 1,
				),
				array(
					'key'                         => 'field_61b72132bf8aa',
					'label'                       => sprintf( esc_html__( 'Sample %s', 'ld-dashboard' ), $lesson_label ),
					'name'                        => 'sfwd-lessons_sample_lesson_cld',
					'type'                        => 'true_false',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => 0,
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'message'                     => sprintf( esc_html__( 'This %s is accessible to all visitors regardless of course enrollment', 'ld-dashboard' ), strtolower( $lesson_label ) ),
					'default_value'               => 0,
					'ui'                          => 0,
					'ui_on_text'                  => '',
					'ui_off_text'                 => '',
				),
				array(
					'key'                         => 'field_61b7215bbf8ab',
					'label'                       => sprintf( esc_html__( '%s Release Schedule', 'ld-dashboard' ), $lesson_label ),
					'name'                        => 'sfwd-lessons_schedule_visible_after_cld',
					'type'                        => 'radio',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => 0,
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 1,
					'choices'                     => array(
						'immediate' => sprintf( esc_html__( 'Immediately (The %s is made available on course enrollment.)', 'ld-dashboard' ), strtolower( $lesson_label ) ),
						'enroll'    => sprintf( esc_html__( 'Enrollment-based (The %s will be available X days after course enrollment.)', 'ld-dashboard' ), strtolower( $lesson_label ) ),
					),
					'allow_null'                  => 0,
					'other_choice'                => 0,
					'default_value'               => '',
					'layout'                      => 'vertical',
					'return_format'               => 'value',
					'save_other_choice'           => 0,
				),
				array(
					'key'                         => 'field_61b72188bf8ac',
					'label'                       => esc_html__( 'Number of Days', 'ld-dashboard' ),
					'name'                        => 'sfwd-lessons_visible_after_cld',
					'type'                        => 'number',
					'instructions'                => '',
					'required'                    => 0,
					'conditional_logic'           => array(
						array(
							array(
								'field'    => 'field_61b7215bbf8ab',
								'operator' => '==',
								'value'    => 'enroll',
							),
						),
					),
					'wrapper'                     => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form custom-learndash-course-form ld-dashboard-form-settings-data-tab ldd-hide-label',
						'id'    => '',
					),
					'frontend_admin_display_mode' => 'edit',
					'only_front'                  => 0,
					'readonly'                    => 0,
					'default_value'               => '',
					'placeholder'                 => esc_html__( 'Enter the number of days', 'ld-dashboard' ),
					'prepend'                     => '',
					'append'                      => esc_html__( 'day(s)', 'ld-dashboard' ),
					'min'                         => '',
					'max'                         => '',
					'step'                        => '',
				),
				array(
					'key'               => 'field_6215e03fe3d27',
					'label'             => sprintf( esc_html__( '%s Category', 'ld-dashboard' ), $lesson_label ),
					'name'              => 'ldd_lesson_category',
					'type'              => 'taxonomy',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form ld-dashboard-form-post-data-tab',
						'id'    => '',
					),
					'taxonomy'          => 'ld_lesson_category',
					'field_type'        => 'multi_select',
					'allow_null'        => 0,
					'add_term'          => 0,
					'save_terms'        => 1,
					'load_terms'        => 0,
					'return_format'     => 'id',
					'multiple'          => 0,
				),
				array(
					'key'               => 'field_621dbf8aababe',
					'label'             => sprintf( esc_html__( '%s Tags', 'ld-dashboard' ), $lesson_label ),
					'name'              => 'ldd_lesson_tags',
					'type'              => 'taxonomy',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => 'custom-learndash-lesson-form ld-dashboard-form-post-data-tab',
						'id'    => '',
					),
					'taxonomy'          => 'ld_lesson_tag',
					'field_type'        => 'multi_select',
					'allow_null'        => 0,
					'add_term'          => 1,
					'save_terms'        => 1,
					'load_terms'        => 0,
					'return_format'     => 'id',
					'multiple'          => 0,
				),
			);

			// Add/Edit lesson form fields for frontend.
			$fields = apply_filters( 'ld_dashboard_lesson_form_fields', $fields );

			// Register lesson form fields for frontend.
			acf_add_local_field_group(
				array(
					'key'                   => 'lesson-field-group',
					'title'                 => esc_html__( 'Lesson Form', 'ld-dashboard' ),
					'fields'                => $fields,
					'location'              => array(
						array(
							array(
								'param'    => 'page',
								'operator' => '==',
								'value'    => Ld_Dashboard_Functions::instance()->ld_dashboard_get_page_id( 'dashboard' ),
							),
							array(
								'param'    => 'current_user',
								'operator' => '==',
								'value'    => 'viewing_front',
							),
						),
					),
					'menu_order'            => 0,
					'position'              => 'normal',
					'style'                 => 'default',
					'label_placement'       => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen'        => '',
					'active'                => true,
					'description'           => '',
				)
			);

			endif;
	}
}