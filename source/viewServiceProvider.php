<?php

namespace html;

use foundation\serviceProvider;
use Twig_Loader_Filesystem as loader;
use Twig_Environment as twig;

class viewServiceProvider extends serviceProvider
{
	public function register ( )
	{
		$this->app->share ( 'view', function ( )
		{
			$loader = new loader ( path::to ( 'views' ) );
			$twig = new Twig_Environment ( $loader, 
			[
			    'cache' => false,
			] );
			return new view ( $twig );
		} );
	}
}