<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Template file extension
	|--------------------------------------------------------------------------
	|
	| This lets you define the extension for template files. It doesn't affect
	| how Twiggy deals with templates but this may help you if you want to
	| distinguish different kinds of templates.
	|
	*/
	"template_file_ext" => ".twig",


	/*
	|--------------------------------------------------------------------------
	| Syntax Delimiters
	|--------------------------------------------------------------------------
	|
	| If you don't like the default Twig syntax delimiters or if they collide
	| with other languages (for example, you use handlebars.js in your
	| templates), here you can change them.
	|
	| Ruby erb style:
	|
	|	'tag_comment' 	=> array('<%#', '#%>'),
	|	'tag_block'   	=> array('<%', '%>'),
	|	'tag_variable'	=> array('<%=', '%>')
	|
	| Smarty style:
	|
	|    'tag_comment' 	=> array('{*', '*}'),
	|    'tag_block'   	=> array('{', '}'),
	|    'tag_variable'	=> array('{$', '}'),
	|
	*/
	"delimiters" => [
		'tag_comment' 	=> array('{#', '#}'),
		'tag_block'   	=> array('{%', '%}'),
		'tag_variable'	=> array('{{', '}}')
	],


	/*
	|--------------------------------------------------------------------------
	| Environment Options
	|--------------------------------------------------------------------------
	|
	| These are all twig-specific options that you can set. To learn more about
	| each option, check the official documentation.
	|
	| NOTE: cache option works slightly differently than in Twig. In Twig you
	| can either set the value to FALSE to disable caching, or set the path
	| to where the cached files should be stored (which means caching would be
	| enabled in that case). This is not entirely convenient if you need to
	| switch between enabled or disabled caching for debugging or other reasons.
	|
	| Therefore, here the value can be either TRUE or FALSE. Cache directory
	| can be set separately.
	|
	*/
	"environment" => [
		"cache" => false,
		"debug" => false,
		"charset" => 'utf-8',
		"base_template_class" => "Twig_Template",
		"auto_reload" => NULL,
		"strict_variables" => false,
		"autoescape" => false,
		"optimizations" => -1,
	],


	/*
	|--------------------------------------------------------------------------
	| Twig Cache Dir
	|--------------------------------------------------------------------------
	|
	| Path to the cache folder for compiled twig templates. It is relative to
	| CodeIgniter's base directory.
	|
	*/
	"twig_cache_dir" => storage_path('twig/cache'),


	/*
	|--------------------------------------------------------------------------
	| Include APPPATH
	|--------------------------------------------------------------------------
	|
	| This lets you include the APPPATH for the themes base directory (only for
	| the application itself, not the modules). See the example below.
	|
	| Suppose you have:
	| $config['themes_base_dir'] = 'themes/'
	| $config['include_apppath'] = TRUE
	|
	| Then the path will be {APPPATH}/themes/ but if you set this option to
	| FALSE, then you will have themes/.
	|
	| This is useful for when you want to have the themes folder outside the
	| application (APPPATH) folder.
	|
	*/
	"include_apppath" => false,


	/*
	|--------------------------------------------------------------------------
	| Themes Base Dir
	|--------------------------------------------------------------------------
	|
	| Directory where themes are located at. This path is relative to
	| CodeIgniter's base directory OR module's base directory. For example:
	|
	| $config['themes_base_dir'] = 'themes/';
	|
	| It will actually mean that themes should be placed at:
	|
	| {APPPATH}/themes/ and {APPPATH}/modules/{some_module}/themes/.
	|
	| NOTE: modules do not necessarily need to be in {APPPATH}/modules/ as
	| Twiggy will figure out the paths by itself. That way you can package
	| your modules with themes.
	|
	| Also, do not forget the trailing slash!
	|
	*/
	"themes_base_dir" => "themes/",


	/*
	|--------------------------------------------------------------------------
	| Default theme
	|--------------------------------------------------------------------------
	*/
	"default_theme" => "default",


	/*
	|--------------------------------------------------------------------------
	| Default layout
	|--------------------------------------------------------------------------
	*/
	"default_layout" => "index",


	/*
	|--------------------------------------------------------------------------
	| Default template
	|--------------------------------------------------------------------------
	*/
	"default_template" => "index",


	/*
	|--------------------------------------------------------------------------
	| Auto-reigster functions
	|--------------------------------------------------------------------------
	|
	| Here you can list all the functions that you want Twiggy to automatically
	| register them for you.
	|
	| NOTE: only registered functions can be used in Twig templates.
	| e.g 'date', 'phpversion', 'phpinfo'
	|
	| For custom functions: Write your functions in a helper file. See README.md
	|
	*/
	"register_functions" => [

	],


	/*
	|--------------------------------------------------------------------------
	| Auto-reigster filters
	|--------------------------------------------------------------------------
	|
	| Much like with functions, list filters that you want Twiggy to
	| automatically register them for you.
	|
	| NOTE: only registered filters can be used in Twig templates. Also, keep
	| in mind that a filter is nothing more than just a regular function that
	| acceps a string (value) as a parameter and outputs a modified/new string.
	|
	*/
	"register_filters" => [

	],


	/*
	|--------------------------------------------------------------------------
	| Title separator
	|--------------------------------------------------------------------------
	|
	| Lets you specify the separator used in separating sections of the title
	| variable.
	|
	*/
	"title_separator" => "|",
];
