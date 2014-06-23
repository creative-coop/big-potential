<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

	<?php
		$eligibility = bp_check_eligibility($node);
	?>
	<?php if($eligibility['eligible'] == TRUE): ?>
		<div class="alert-box success eligible">
			<h3>Congratulations! Your organisation is eligible to apply to Big Potential.</h3>
			<p>You can now start the next step of the application process. We recommend that you read the <a href="#">Big Potential programme guidance</a> before starting the process.</p>
			<p>What next? <a href="<?php print url('diagnostic-tool'); ?>">Start the diagnostic tool now!</a>.</p>
			<p>Question? If you have any questions please call our enquiry line on <strong>0207 842 7788</strong> or email <a href="mailto:bigpotential@sibgroup.org.uk">bigpotential@sibgroup.org.uk</a>.</p>
			<p>Thank you for taking time to register your interest.</p>
		</div>
	<?php else: ?>
		<div class="alert-box success ineligible">
			<h3>Unfortunately, based on the information provided your organisation is not eligible to apply to Big Potential. This is because:</h3>
			<p><ul><?php 
				foreach($eligibility['questions'] as $question) {
					print '<li>'.$question['message'].'</li>';
				} ?>
			</ul></p>
			<p>Thank you for your interest in Big Potential.</p>
		</div>
	<?php endif; ?>

	<?php if(bp_can_user_edit($user, $node)): ?>
	<div id="edit-report">
		<a href="<?php print url('node/'.$node->nid.'/edit'); ?>" class="button back grey">Re-check Eligibility</a>
	</div>
	<?php endif; ?>
</article>
