<?php
class NoteHelper extends AppHelper {

	function __construct($options = null) {
		parent::__construct($options);
	}

	function flagTag($note, $tag = 'span') {
		if($note['flagged']) {
			$class='flag flagged';
			$status = __('Flagged',true);
			return sprintf('<%s class="%s">%s</%s>',$tag,$class,$status,$tag);
		} else {
			return '';
		}
	}
}
