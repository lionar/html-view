<?php

namespace html;

use foundation\serviceProvider;
use path;
use Twig_Loader_Filesystem as loader;
use Twig_Environment as twig;
use view as viewFacade;

class viewServiceProvider extends serviceProvider
{
	public function register ( )
	{
		$this->app->share ( 'view', function ( )
		{
			$loader = new loader ( path::to ( 'views' ) );
			$twig = new twig ( $loader, 
			[
			    'cache' => false,
			] );
			return new view ( $twig );
		} );

		viewFacade::composedBy ( $this->app->make ( 'view' ) );
	}
}