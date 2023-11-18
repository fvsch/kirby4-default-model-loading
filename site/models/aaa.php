<?php

class AaaPage extends DefaultPage
{
	function renderBody()
	{
		$field = $this->content()->get('body');
		if (is_string($field->value)) {
			$field->value = mb_strtoupper($field->value);
		}
		return $field->markdown();
	}
}
