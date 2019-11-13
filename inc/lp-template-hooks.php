<?php
/**
 * Build courses content
 */

defined( 'ABSPATH' ) || exit();

/**
 * New functions since 3.0.0
 */

/**
 * Course buttons
 *
 * @see learn_press_course_purchase_button
 * @see learn_press_course_enroll_button
 * @see learn_press_course_retake_button
 * @see learn_press_course_continue_button
 * @see learn_press_course_finish_button
 * @see learn_press_course_external_button
 */
learn_press_add_course_buttons();

/**
 * Course curriculum.
 *
 * @see learn_press_curriculum_section_title
 * @see learn_press_curriculum_section_content
 */
// @deprecated add_action( 'learn-press/section-summary', 'learn_press_curriculum_section_title', 5 );
add_action( 'learn-press/section-summary', LP()->template()->callback( 'single-course/section/title.php', array( 'section' ) ), 5 );
// @deprecated add_action( 'learn-press/section-summary', 'learn_press_curriculum_section_content', 10 );
add_action( 'learn-press/section-summary', LP()->template()->callback( 'single-course/section/content.php', array( 'section' ) ), 10 );

/**
 * Checkout
 *
 * @see learn_press_checkout_form_login
 * @see learn_press_checkout_form_register
 */
add_action( 'learn-press/before-checkout-form', 'learn_press_checkout_form_login', 5 );
add_action( 'learn-press/before-checkout-form', 'learn_press_checkout_form_register', 10 );

/**
 * @see learn_press_order_review
 */
add_action( 'learn-press/checkout-order-review', 'learn_press_order_review', 5 );

/**
 * @see learn_press_order_comment
 * @see learn_press_order_payment
 */
add_action( 'learn-press/after-checkout-order-review', 'learn_press_order_comment', 5 );
add_action( 'learn-press/after-checkout-order-review', 'learn_press_order_payment', 10 );

/**
 * @see learn_press_order_guest_email
 */
add_action( 'learn-press/payment-form', 'learn_press_order_guest_email', 15 );

/**
 * @see learn_press_user_profile_header
 */
// @deprecated add_action( 'learn-press/before-user-profile', 'learn_press_user_profile_header', 5 );
add_action( 'learn-press/before-user-profile', LP()->template( 'profile' )->func( 'header' ), 5 );

/**
 * @see learn_press_user_profile_content
 * @see learn_press_user_profile_tabs
 */
// @deprecated add_action( 'learn-press/user-profile', 'learn_press_user_profile_tabs', 5 );
add_action( 'learn-press/user-profile', LP()->template( 'profile' )->func( 'tabs' ), 5 );
// @deprecated add_action( 'learn-press/user-profile', 'learn_press_user_profile_content', 10 );
add_action( 'learn-press/user-profile', LP()->template( 'profile' )->func( 'content' ), 10 );

/**
 * @see learn_press_user_profile_footer
 */
//add_action( 'learn-press/after-user-profile', 'learn_press_user_profile_footer', 5 );

/**
 * @see learn_press_profile_tab_orders
 * @see learn_press_profile_recover_order_form
 */

add_action( 'learn-press/profile/orders', LP()->template( 'profile' )->callback( 'profile/tabs/orders/list.php' ), 5 );
add_action( 'learn-press/profile/orders', LP()->template( 'profile' )->callback( 'profile/tabs/orders/recover-order.php' ), 10 );

/**
 * @see learn_press_profile_order_details
 * @see learn_press_profile_order_recover
 * @see learn_press_profile_order_message
 */
add_action( 'learn-press/profile/order-details', LP()->template( 'profile' )->func( 'order_details' ), 5 );
add_action( 'learn-press/profile/order-details', LP()->template( 'profile' )->func( 'order_recover' ), 10 );
add_action( 'learn-press/profile/order-details', LP()->template( 'profile' )->func( 'order_message' ), 15 );

/**
 * @see learn_press_profile_dashboard_logged_in
 * @see learn_press_profile_dashboard_user_bio
 */
add_action( 'learn-press/profile/dashboard-summary', LP()->template( 'profile' )->func( 'dashboard_logged_in' ), 5 );
add_action( 'learn-press/profile/dashboard-summary', LP()->template( 'profile' )->func( 'dashboard_user_bio' ), 10 );

/**
 * @see learn_press_profile_dashboard_not_logged_in
 * @see learn_press_profile_login_form
 * @see learn_press_profile_register_form
 */
add_action( 'learn-press/user-profile', LP()->template( 'profile' )->func( 'dashboard_not_logged_in' ), 5 );
add_action( 'learn-press/user-profile', LP()->template( 'profile' )->func( 'login_form' ), 10 );
add_action( 'learn-press/user-profile', LP()->template( 'profile' )->func( 'register_form' ), 15 );

/**
 * @see learn_press_profile_mobile_menu
 */
add_action( 'learn-press/before-profile-nav', LP()->template( 'profile' )->callback( 'profile/mobile-menu.php' ), 5 );

/**
 * @see learn_press_single_course_summary
 */
add_action( 'learn-press/single-course-summary', LP()->template()->callback( 'single-course/content' ), 5 );
add_action( 'learn-press/single-course-summary', LP()->template()->func( 'course_sidebar' ), 5 );

/**
 * @see learn_press_course_meta_start_wrapper
 * @see learn_press_course_price
 * @see learn_press_course_instructor
 * @see learn_press_course_students
 * @see learn_press_course_meta_end_wrapper
 * @see learn_press_single_course_content_lesson
 * @see learn_press_single_course_content_item
 * @see learn_press_course_tabs
 * @see learn_press_course_buttons
 */
//add_action( 'learn-press/content-landing-summary', 'learn_press_course_meta_start_wrapper', 5 );
//add_action( 'learn-press/content-landing-summary', 'learn_press_course_students', 10 );
//add_action( 'learn-press/content-landing-summary', 'learn_press_course_meta_end_wrapper', 15 );
//add_action( 'learn-press/content-landing-summary', 'learn_press_course_tabs', 20 );
//add_action( 'learn-press/content-landing-summary', 'learn_press_course_price', 25 );
//add_action( 'learn-press/content-landing-summary', LP()->template()->callback( 'single-course/buttons.php' ), 30 );
//add_action( 'learn-press/content-landing-summary', 'learn_press_course_instructor', 35 );

/**
 * @see learn_press_course_meta_start_wrapper
 * @see learn_press_course_instructor
 * @see learn_press_course_students
 * @see learn_press_course_meta_end_wrapper
 * @see learn_press_single_course_content_lesson
 * @see learn_press_single_course_content_item
 * @see learn_press_course_progress
 * @see learn_press_course_tabs
 * @see learn_press_course_buttons
 * @see learn_press_course_remaining_time
 */
add_action( 'learn-press/course-content-summary', LP()->template()->callback( 'global/course-meta-start' ), 10 );
add_action( 'learn-press/course-content-summary', LP()->template()->callback( 'single-course/students' ), 15 );
add_action( 'learn-press/course-content-summary', LP()->template()->callback( 'global/course-meta-end' ), 20 );
add_action( 'learn-press/course-content-summary', LP()->template()->callback( 'single-course/progress' ), 25 );
add_action( 'learn-press/course-content-summary', LP()->template()->func( 'remaining_time' ), 30 );
add_action( 'learn-press/course-content-summary', LP()->template()->callback( 'single-course/tabs/tabs' ), 35 );
add_action( 'learn-press/course-content-summary', LP()->template()->callback( 'single-course/buttons' ), 40 );
//add_action( 'learn-press/content-learning-summary', 'learn_press_course_instructor', 45 );

/**
 * Course item content
 */

/**
 * @see learn_press_content_single_item
 * @see learn_press_content_single_course
 */
//add_action( 'learn-press/content-single', 'learn_press_content_single_item', 10 );
//add_action( 'learn-press/content-single', 'learn_press_content_single_course', 10 );

/**
 * @see learn_press_course_curriculum_tab
 * @see learn_press_single_course_content_item
 */
//add_action( 'learn-press/single-item-summary', 'learn_press_course_curriculum_tab', 5 );
//add_action( 'learn-press/single-item-summary', 'learn_press_single_course_content_item', 10 );
add_action( 'learn-press/single-item-summary', LP()->template()->func( 'popup_header' ), 5 );
add_action( 'learn-press/single-item-summary', LP()->template()->func( 'popup_sidebar' ), 10 );
add_action( 'learn-press/single-item-summary', LP()->template()->func( 'popup_content' ), 10 );
add_action( 'learn-press/single-item-summary', LP()->template()->func( 'popup_footer' ), 15 );

add_action( 'learn-press/popup-footer', LP()->template()->func( 'popup_footer_nav' ), 15 );

/**
 * @see learn_press_course_item_content
 * @see learn_press_content_item_comments
 */
//add_action( 'learn-press/course-item-content', 'learn_press_course_item_content', 5 );
add_action( 'learn-press/course-item-content', LP()->template()->func( 'course_item_content' ), 5 );
//add_action( 'learn-press/course-item-content', 'learn_press_content_item_comments', 10 );

/**
 * @see learn_press_content_item_nav
 * @see learn_press_disable_course_comment_form
 */
add_action( 'learn-press/after-course-item-content', 'learn_press_content_item_nav', 5 );
add_action( 'learn-press/after-course-item-content', 'learn_press_lesson_comment_form', 10 );
// add_action( 'learn-press/after-course-item-content', 'learn_press_disable_course_comment_form', 1000 );

/**
 * @see learn_press_content_item_lesson_title
 * @see learn_press_content_item_lesson_content
 * @see learn_press_content_item_lesson_content_blocked
 * @see learn_press_content_item_lesson_complete_button
 */
add_action( 'learn-press/before-content-item-summary/lp_lesson', LP()->template()->func( 'item_lesson_title' ), 10 );
add_action( 'learn-press/content-item-summary/lp_lesson', LP()->template()->func( 'item_lesson_content' ), 10 );
add_action( 'learn-press/content-item-summary/lp_lesson', LP()->template()->func( 'item_lesson_content_blocked' ), 15 );
add_action( 'learn-press/after-content-item-summary/lp_lesson', LP()->template()->func( 'item_lesson_complete_button' ), 10 );
add_action( 'learn-press/after-content-item-summary/lp_lesson', LP()->template()->func( 'course_finish_button' ), 15 );

add_action( 'learn-press/content-item-summary-class', 'learn_press_content_item_summary_classes', 15 );

/**
 * @see learn_press_content_item_header
 * @see learn_press_content_item_footer
 * @see learn_press_section_item_meta
 */
//add_action( 'learn-press/course-item-content-header', LP()->template()->callback('single-course/content-item/header.php'), 10 );
//add_action( 'learn-press/course-item-content-footer', LP()->template()->callback('single-course/content-item/footer.php'), 10 );
add_action( 'learn-press/after-section-loop-item-title', LP()->template()->callback( 'single-course/section/item-meta.php', array(
	'item',
	'section'
) ), 10, 2 );

/**
 * @see learn_press_quiz_meta_questions
 * @see learn_press_item_meta_duration
 * @see learn_press_quiz_meta_final
 */
add_action( 'learn-press/course-section-item/before-lp_quiz-meta', 'learn_press_quiz_meta_questions', 5 );
add_action( 'learn-press/course-section-item/before-lp_quiz-meta', 'learn_press_item_meta_duration', 10 );
add_action( 'learn-press/course-section-item/before-lp_quiz-meta', 'learn_press_quiz_meta_final', 15 );

/**
 * @see learn_press_item_meta_duration
 */
add_action( 'learn-press/course-section-item/before-lp_lesson-meta', 'learn_press_item_meta_duration', 5 );

/**
 * @see learn_press_content_item_summary_title
 * @see learn_press_content_item_summary_content
 */
// @deprecated add_action( 'learn-press/before-content-item-summary/lp_quiz', 'learn_press_content_item_quiz_title', 5 );
add_action( 'learn-press/before-content-item-summary/lp_quiz', LP()->template()->callback( 'content-quiz/title.php' ), 5 );
//add_action( 'learn-press/before-content-item-summary/lp_quiz', 'learn_press_content_item_quiz_intro', 10 );

/**
 * @see learn_press_content_item_summary_quiz_content
 * @see learn_press_content_item_summary_quiz_progress
 * @see learn_press_content_item_summary_quiz_result
 * @see learn_press_content_item_summary_quiz_countdown
 * @see learn_press_content_item_summary_quiz_question
 *
 */
//add_action( 'learn-press/content-item-summary/lp_quiz', 'learn_press_content_item_summary_quiz_progress', 5 );
//add_action( 'learn-press/content-item-summary/lp_quiz', 'learn_press_content_item_summary_quiz_result', 10 );
//add_action( 'learn-press/content-item-summary/lp_quiz', 'learn_press_content_item_summary_quiz_content', 15 );
//add_action( 'learn-press/content-item-summary/lp_quiz', 'learn_press_content_item_summary_quiz_countdown', 20 );
//add_action( 'learn-press/content-item-summary/lp_quiz', 'learn_press_content_item_summary_quiz_question', 25 );

/**
 * @param LP_Question $question
 * @param array       $args
 *
 * @return array
 */
function xxx_get_question_options_for_js( $question, $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'cryptoJsAes'     => false,
			'include_is_true' => true
		)
	);

	if ( $args['cryptoJsAes'] ) {
		$options = array_values( $question->get_answer_options() );

		$key     = uniqid();
		$options = array(
			'data' => cryptoJsAesEncrypt( $key, wp_json_encode( $options ) ),
			'key'  => $key
		);
	} else {
		$exclude_option_key = array( 'question_id', 'order' );
		if ( ! $args['include_is_true'] ) {
			$exclude_option_key[] = 'is_true';
		}

		$options = array_values( $question->get_answer_options(
			array(
				'exclude' => $exclude_option_key,
				'map'     => array( 'question_answer_id' => 'uid' )
			)
		) );
	}

	return $options;
}

add_action( 'learn-press/content-item-summary/lp_quiz', LP()->template()->callback( 'content-quiz/js' ), 25 );

/**
 * @see learn_press_content_item_summary_quiz_buttons
 * @see learn_press_content_item_summary_question_numbers
 * @see learn_press_content_item_summary_questions
 */
//add_action( 'learn-press/after-content-item-summary/lp_quiz', LP()->template()->callback( 'content-quiz/buttons.php' ), 5 );
//add_action( 'learn-press/after-content-item-summary/lp_quiz', 'learn_press_content_item_summary_question_numbers', 10 );
//add_action( 'learn-press/after-content-item-summary/lp_quiz', 'learn_press_content_item_summary_questions', 15 );
//
/**
 * @see learn_press_content_item_review_quiz_title
 * @see learn_press_content_item_summary_question_title
 * @see learn_press_content_item_summary_question_content
 * @see learn_press_content_item_summary_question
 * @see learn_press_content_item_summary_question_explanation
 * @see learn_press_content_item_summary_question_hint
 */
//add_action( 'learn-press/question-content-summary', 'learn_press_content_item_review_quiz_title', 5 );
//add_action( 'learn-press/question-content-summary', 'learn_press_content_item_summary_question_title', 10 );
//add_action( 'learn-press/question-content-summary', 'learn_press_content_item_summary_question_content', 15 );
//add_action( 'learn-press/question-content-summary', 'learn_press_content_item_summary_question', 20 );
//add_action( 'learn-press/question-content-summary', 'learn_press_content_item_summary_question_explanation', 25 );
//add_action( 'learn-press/question-content-summary', 'learn_press_content_item_summary_question_hint', 30 );

/**
 * @see learn_press_quiz_nav_buttons
 * @see learn_press_quiz_start_button
 * @see learn_press_quiz_check_button
 * @see learn_press_quiz_hint_button
 * @see learn_press_quiz_continue_button
 * @see learn_press_quiz_complete_button
 * @see learn_press_quiz_result_button
 * @see learn_press_quiz_summary_button
 * @see learn_press_quiz_redo_button
 */
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_nav_buttons', 5 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_start_button', 10 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_check_button', 15 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_hint_button', 20 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_continue_button', 25 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_complete_button', 30 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_result_button', 35 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_summary_button', 40 );
//add_action( 'learn-press/quiz-buttons', 'learn_press_quiz_redo_button', 45 );
add_action( 'learn-press/quiz-buttons', LP()->template()->func( 'course_finish_button' ), 50 );

/**
 * @see learn_press_control_displaying_course_item
 */
add_action( 'learn-press/parse-course-item', 'learn_press_control_displaying_course_item', 5 );

/**
 * Single course param.
 *
 * @see learn_press_single_course_args()
 */
add_action( 'learn-press/after-single-course', 'learn_press_single_course_args', 5 );

/**
 * @see learn_press_single_document_title_parts()
 */
add_filter( 'document_title_parts', 'learn_press_single_document_title_parts', 5 );

/***********************************/
/*         BECOME A TEACHER        */
/***********************************/

/**
 * @see learn_press_become_teacher_messages
 * @see learn_press_become_teacher_heading
 */
add_action( 'learn-press/before-become-teacher-form', 'learn_press_become_teacher_messages', 5 );
add_action( 'learn-press/before-become-teacher-form', 'learn_press_become_teacher_heading', 10 );

/**
 * @see learn_press_become_teacher_form_fields
 * @see learn_press_become_teacher_button
 */
add_action( 'learn-press/become-teacher-form', 'learn_press_become_teacher_form_fields', 5 );
add_action( 'learn-press/after-become-teacher-form', 'learn_press_become_teacher_button', 10 );

/**
 * @see learn_press_body_classes
 * @see learn_press_course_class
 */
add_filter( 'body_class', 'learn_press_body_classes', 10 );
add_filter( 'post_class', 'learn_press_course_class', 15, 3 );

/**
 * @see learn_press_wrapper_start
 * @see learn_press_breadcrumb
 * @see learn_press_search_form
 */
//add_action( 'learn-press/before-main-content', LP()->template()->callback( 'global/before-main-content.php' ), 5 );
//add_action( 'learn-press/before-main-content', LP()->template()->func('breadcrumb'), 10 );
//add_action( 'learn-press/before-main-content', LP()->template()->func('search_form'), 15 );

/**
 * @see learn_press_wrapper_end
 */
add_action( 'learn-press/after-main-content', LP()->template()->callback( 'global/after-main-content.php' ), 5 );

/**
 * @see learn_press_courses_loop_item_thumbnail
 * @see learn_press_courses_loop_item_title
 */
add_action( 'learn-press/before-courses-loop-item', LP()->template()->callback( 'loop/course/thumbnail.php' ), 10 );
//add_action( 'learn-press/before-courses-loop-item', 'learn_press_courses_loop_item_instructor', 5 );

/**
 * @see learn_press_courses_loop_item_begin_meta
 * @see learn_press_courses_loop_item_price
 * @see learn_press_courses_loop_item_instructor
 * @see learn_press_courses_loop_item_end_meta
 * @see learn_press_course_loop_item_buttons
 * @see learn_press_course_loop_item_user_progress
 */
add_action( 'learn-press/before-courses-loop-item', function () {
	echo '<div class="course-content">';
}, 1000 );

add_action( 'learn-press/courses-loop-item-title', LP()->template()->callback( 'loop/course/title.php' ), 5 );


//add_action( 'learn-press/after-courses-loop-item', LP()->template()->callback('loop/course/meta-begin.php'), 10 );

add_action( 'learn-press/after-courses-loop-item', LP()->template()->func( 'courses_loop_item_meta' ), 0 );
add_action( 'learn-press/after-courses-loop-item', LP()->template()->func( 'courses_loop_item_info_begin' ), 0 );

add_action( 'learn-press/after-courses-loop-item', LP()->template()->func( 'clearfix' ), 20 );
add_action( 'learn-press/after-courses-loop-item', LP()->template()->func( 'courses_loop_item_students' ), 20 );
add_action( 'learn-press/after-courses-loop-item', LP()->template()->func( 'courses_loop_item_price' ), 20 );
//add_action( 'learn-press/after-courses-loop-item', LP()->template()->callback( 'single-course/title' ), 20 );


//add_action( 'learn-press/after-courses-loop-item', LP()->template()->callback( 'courses_loop_item_price' ), 20 );

//add_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_instructor', 25 );
//add_action( 'learn-press/after-courses-loop-item', LP()->template()->callback('loop/course/meta-end.php'), 30 );

add_action( 'learn-press/after-courses-loop-item', LP()->template()->func( 'courses_loop_item_info_end' ), 99 );

//add_action( 'learn-press/after-courses-loop-item', LP()->template()->callback('single-course/buttons.php'), 35 );
add_action( 'learn-press/after-courses-loop-item', 'learn_press_course_loop_item_user_progress', 40 );

add_action( 'learn-press/after-courses-loop-item', function () {
	echo '</div>';
}, 1000 );
//add_action( 'learn-press/after-courses-loop-item', LP()->template()->func( 'course_button' ), 1000 );
/**
 * @see learn_press_courses_pagination
 */
add_action( 'learn-press/after-courses-loop', LP()->template()->callback( 'loop/course/pagination.php' ), 5 );

/**
 * @see learn_press_single_course_args
 */
add_action( 'wp_head', 'learn_press_single_course_args', 5 );

/**
 * @see learn_press_checkout_user_form
 * @see learn_press_checkout_user_logged_in
 */
//add_action( 'learn-press/before-checkout-order-review', LP()->template()->callback('checkout/user-form.php'), 5 );
add_action( 'learn-press/before-checkout-order-review', LP()->template()->callback( 'checkout/form-logged-in.php' ), 10 );

add_filter( 'comments_template_query_args', 'learn_press_comments_template_query_args' );
add_filter( 'get_comments_number', 'learn_press_filter_get_comments_number' );

/**
 * @see learn_press_back_to_class_button
 */
add_action( 'learn-press/after-checkout-form', 'learn_press_back_to_class_button' );
add_action( 'learn-press/after-empty-cart-message', 'learn_press_back_to_class_button' );

/**
 * add_action( 'learn_press_checkout_user_form', LP()->template()->callback('checkout/form-login.php'), 5 );
 * add_action( 'learn_press_checkout_user_form', LP()->template()->callback('checkout/form-register.php'), 10 );
 * add_action( 'learn_press_checkout_order_review', 'learn_press_order_review', 5 );
 * add_action( 'learn_press_checkout_order_review', 'learn_press_order_comment', 10 );
 * add_action( 'learn_press_checkout_order_review', 'learn_press_order_payment', 15 );
 * add_action( 'learn_press_after_quiz_question_title', 'learn_press_single_quiz_question_answer', 5, 2 );
 * add_action( 'learn_press_order_received', 'learn_press_order_details_table', 5 );
 * add_action( 'learn_press_before_template_part', 'learn_press_generate_template_information', 999, 4 );
 * add_action( 'learn_press/after_course_item_content', 'learn_press_course_item_edit_link', 10, 2 );
 * add_action( 'learn_press/after_course_item_content', 'learn_press_course_nav_items', 10, 2 );
 * add_action( 'learn_press/after_course_item_content', 'learn_press_lesson_comment_form', 10, 2 );
 */

/**
 * @see learn_press_reset_single_item_summary_content
 */
//add_action( 'wp_head', 'learn_press_reset_single_item_summary_content' );

/**
 * 3.3.0
 */

add_action( 'learn-press/before-courses-loop', LP()->template()->func( 'courses_top_bar' ), 10 );

function learn_press_custom_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'learn_press_custom_excerpt_length', 999 );


add_action( 'learn-press/course-summary-sidebar', LP()->template()->func( 'course_sidebar_preview' ), 10 );
add_action( 'learn-press/course-summary-sidebar', LP()->template()->func( 'course_extra_key_features' ), 10 );
add_action( 'learn-press/course-summary-sidebar', LP()->template()->func( 'course_extra_requirements' ), 10 );

///
add_filter( 'learn_press_get_template', LP()->template( 'general' )->func( 'filter_block_content_template' ), 10, 5 );
add_action( 'learn-press/after-payment-methods', LP()->template( 'general' )->func( 'term_conditions_template' ) );
