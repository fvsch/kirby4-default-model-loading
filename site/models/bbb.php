<?php

use Kirby\Content\Field;

class BbbPage extends DefaultPage
{
	function title(): Field
	{
		$field = new Field(null, 'title', 'Honey I replaced the title');
		return $field;
	}
}
