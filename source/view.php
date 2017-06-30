<?php

namespace html;

use Twig_Loader_Filesystem as loader;
use Twig_Environment as twig;

class view implements \agreed\view
{
	private $engine = null;

	public function __construct ( string $path, $cache = false )
	{
		$loader = new loader ($path );

		$this->engine = new twig ( $loader, 
		[
		    'cache' => $cache,
		] );
	}

	public function make ( string $template, array $data = [ ] ) : string
	{
		return $this->engine->render ( $template . '.twig', $data );
	}
}