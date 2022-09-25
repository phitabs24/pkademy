<?php
foreach ( $answers as $key => $answer ) :
	$correct     = ( isset( $answer['correct'] ) ) ? 'on' : '';
	$correct_key = 0;
	$allow_html  = ( isset( $answer['allow_html'] ) && 'on' == $answer['allow_html'] ) ? 'on' : '';
	$answer_text = ( isset( $answer['answer'] ) ) ? $answer['answer'] : '';
	?>
	<div class='container appendsingleContent ld-dashboard-question-answer-box' data-item_key="<?php echo esc_attr( $key ); ?>">
		<br>
		<div class='correct-singleContent-answer-input'  >
			<div class='correct-singleContent' style='width:30%;'>
				<input type='radio' name='sfwd-question_single_answer_cld[<?php echo esc_attr( $key ); ?>][correct]' class='correct ldd-single-choice-radio'  <?php checked( $correct, 'on' ); ?> /> <?php esc_html_e( 'Correct', 'ld-dashboard' ); ?><br>
				<input type='checkbox' name='sfwd-question_single_answer_cld[<?php echo esc_attr( $key ); ?>][allow_html]' class='allow_html' value="on" <?php checked( $allow_html, 'on' ); ?> /> <?php esc_html_e( 'Allow HTML', 'ld-dashboard' ); ?><br>
			</div>
			<div class='answer-input' style='width:100%;'>
				<label name =''>
					<?php
						esc_html_e( 'Answer', 'ld-dashboard' );
					?>
				</label>
				<textarea name = 'sfwd-question_single_answer_cld[<?php echo esc_attr( $key ); ?>][answer]' value = '' ><?php echo $answer_text; ?></textarea><br>
			</div>
		</div>
		<div class="correct-singleContent-bottom">
			<button class='delete-ques-ans' style='margin:0 5px'><?php esc_html_e( 'Delete answer', 'ld-dashboard' ); ?></button>
			<button class='add-media-ques-ans' data-index='' style='margin:0 5px'><?php esc_html_e( 'Add Media', 'ld-dashboard' ); ?></button>
			<span class='move-ques-ans' style='margin:0 5px'><?php esc_html_e( 'Move', 'ld-dashboard' ); ?></span>
		</div>
	</div>
		<?php
endforeach;

