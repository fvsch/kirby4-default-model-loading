<?php

use Kirby\Cms\Page;

class DefaultPage extends Page
{
	function renderBody()
	{
		return $this->content()->get('body')->markdown();
	}
}
