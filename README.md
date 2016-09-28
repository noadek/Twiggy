Allows you to use [Twig](http://twig.sensiolabs.org/) without replacing the default blade templating engine in [Laravel 5](http://laravel.com/). Based on Edmundas Kondrašovas [Twiggy for CodeIgniter](https://github.com/edmundask/codeigniter-twiggy)

## Requirements

Twiggy requires Laravel 5.

## Installation

Require this package with Composer

```bash
composer require noadek/twiggy
```

## Quick Start

Once Composer has installed or updated your packages you need to register Twiggy with Laravel itself. Open up config/app.php and find the providers key, towards the end of the file, and add the Twiggy Service Provider, to the end:

```php
'providers' => [
     ...
                Twiggy\Provider\TwiggyServiceProvider::class,
],
```

Now we will use Artisan to add the new twig config file:

```php
php artisan vendor:publish --provider="Twiggy\Provider\TwiggyServiceProvider"
```
## Configuration
The `php artisan vendor:publish --provider="Twiggy\Provider\TwiggyServiceProvider"` provides you with a default twiggy.php configuration file located in config directory.

## Set up dir structure
Twiggy follows a specific theme-layout-template structure that helps separates your logic from your views. You can create multiple themes and layouts and switch themes and layout on the fly! By default Twiggy will look for your twig files in a themes folder at the server root (you can change this if you like in the config/twiggy.php file provided). So you should create these directories and files.

1. Create a directory structure:

	```
    +-{LARAVELAPP}/
    | +-app/
    ...
    | +-themes/
    | | +-default/
    | | | +-layouts/
	```

2. Create a default layout `index.twig` and place it in layouts folder:

	```
    <!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
			<title>Default layout</title>
		</head>
        <body>
            {% block content %}

            {% endblock %}
		</body>
	</html>
	```

3. Create a default template file `index.twig` at the root of `default` theme folder:

	```
	{% extends _layout %}

	{% block content %}

		Default template file.

	{% endblock %}
	```

4. You should end up with a structure like this:

	```
    +-{LARAVELAPP}/
    | +-themes/
    | | +-default/
    | | | +-layouts/
    | | | | +-index.twig
    | | | +-index.twig
	```

## Usage

At this point you can now begin using twig. Twiggy basically provides you with various helpers for setting up your views or templates.

You call the twig template like a view but with the twig() helper.

```php
//app/Http/routes.php
//twig template themes/hello.twig
Route::get('/', function () {
    return twig('hello');
});
```

Twiggy provides other useful helpers for building a theme-layout-template structure for your views.

### Setting the theme
The default twiggy theme is 'default'. This can be changed in the config/twiggy.php file. To create a new theme, add a new folder with the desired theme name in the themes folder.

Setting your theme on the fly.
```php
<?php
...

    setTheme('default');

```
'default' can be changed to any other theme you may have created. You may want to build a CMS-like system, this can be manipulated to be set from a database, so users of the system can change themes.

### Setting a layout
Different pages may have different layouts depending on the structure and design of your app. Twiggy lets you set and switch layouts as you like. See the example below:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        setTheme('default');
        setLayout('index');
    }

    public function index()
    {
        $name = 'I am Twiggy';

		return twig('index', compact('name'));
    }

    public function test()
    {
        setLayout('blog');

        return twig('post');
    }
}
```

In the example, the index page will use the 'default' theme and the 'index' layout to display the 'index' template. The test page, on the other hand, will use the 'default' theme but the 'blog' layout to display the 'post' template.

### Setting the page title
Twiggy provides three functions for building page titles. This functions can be used depending on your SEO technique. The 'setPageTitle' function sets the title of the page, 'appendPageTitle' adds a specified string after the set title while 'prependPageTitle' adds the specified string before the set title.

Both the 'appendPageTitle' and 'prependPageTitle' will use the specified 'title_separator' in the config/twiggy.php file to separate titles.

Let's add a page title to our previous example.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        setTheme('default');
        setLayout('index');
        setPageTitle('Pages');
    }

    public function index()
    {
        appendPageTitle('About Me');

        $name = 'I am Twiggy';

		return twig('index', compact('name'));
    }
    ...
}
```
For this to work, replace the `<title>Default layout</title>` in the index.twig layout file with `<title>{{ title }}</title>`

Here the index page will display the title 'Pages | About Me'. This can also be achieved using
```php
    setPageTitle('Pages', 'About Me');
```

### Setting page metas
Twiggy provides a 'setPageMeta' function for setting dynamic meta tags. This can be useful for setting Open Graph markup for Facebook, Twitter, etc. It can also be used for setting Google site verification meta and other dynamic meta tags.

Let's update our example with meta tags
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        setTheme('default');
        setLayout('index');
        setPageTitle('Pages');
    }

    public function index()
    {
        appendPageTitle('About Me');
        setMetatag('description', 'This is all you need to know about twiggy');
        setMetatag('og:url', url('images/me.jpg'), 'property');

        $name = 'I am Twiggy';

		return twig('index', compact('name'));
    }
    ...
}
```
Also for this to work we have to add the `{{ meta }}` variable to the layout

```
    ...
    <head>
        <meta charset="utf-8">
        {{ meta }}
    ...
    </head>
```

### Registering functions and filters

**Twig** is sandboxed. You can’t just use any PHP function by default, you can’t access things outside the given context and you can’t use plain PHP in your templates. This is done by design, it forces you to separate your business logic from your templates.

You can however specify a list of PHP functions/filters allowed within your templates by adding required functions and filters to the 'register_functions' and 'register_filter' array respectively in the config/twiggy.php file as shown:

```php
"register_functions" => [
    'date',
    'phpversion',
    'foo'
],
```

This tells Twiggy to register the functions 'date', 'phpversion' and a custom function called 'foo'.

### Creating custom functions

Custom functions or filters can be created in several ways in Laravel. You can always find cleaner ways to do it but here's one way to do it using a ServiceProvider:

```php
class AppServiceProvider extends ServiceProvider
{
	protected $defer = true;

	public function boot()
	{
		$this->registerHelper();
	}

	private function registerHelper()
	{
		require app_path(Lib/helpers.php');
	}
}
```

Create the helpers file that will contain your custom functions and filters.

```
+-{APPPATH}/
| +-Lib/
| | +-helpers.php
```

And finally add the service provider to the config/app.php file.
