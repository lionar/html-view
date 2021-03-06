<?php

namespace html;

use Closure as closure;
use Twig_Environment as twig;
use Twig_Loader_Filesystem as loader;
use Twig_SimpleFunction as fn;

class view implements \agreed\view
{
	private $engine = null;

	public function __construct ( string $path, $cache = false )
	{
		$this->setupEngine ( $path, $cache );
	}

	public function make ( string $template, array $data = [ ] ) : string
	{
		return $this->engine->render ( $template . '.twig', $data );
	}

	public function extend ( string $name, closure $fn )
	{
		$this->engine->addFunction ( new fn ( $name, $fn, [ 'is_safe' => [ 'html' ] ] ) );
	}

	public function global ( string $name, $global )
	{
		$this->engine->addGlobal ( $name, $global );
	}

	private function setupEngine ( string $path, $cache )
	{
		$loader = new loader ($path );

		$this->engine = new twig ( $loader, 
		[
		    'cache' => $cache,
		] );
	}
}