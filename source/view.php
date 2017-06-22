<?php

namespace html;

use Twig_Environment as twig;

class view implements \agreed\view
{
	private $engine = null;

	public function __construct ( twig $engine )
	{
		$this->engine = $engine;
	}

	public function make ( string $template, array $data = [ ] ) : string
	{
		return $this->engine->render ( $template . '.twig', $data );
	}
}