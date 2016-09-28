<?php

if (! function_exists('getTwiggyInstance')) {
    /**
     * Returns the instance of class Twiggy
     * @return Twiggy\Twiggy
     */
    function getTwiggyInstance()
    {
        return app('twiggy');
    }
}

if (! function_exists('twig')) {
    /**
     * Displays a twig template - alias for the Twiggy make method
     * @param  string $name
     * @param  array $data
     * @return void
     */
    function twig($name, $data = null)
    {
        $twiggy = getTwiggyInstance();
        // set the template and data
        $twiggy->template($name);
        $twiggy->set($data);

        // compile the view
        return $twiggy->render();
    }
}

if (! function_exists('setTheme')) {
    /**
     * Sets the theme for twiggy
     * @param  string $name
     * @return void
     */
    function setTheme($name)
    {
        $twiggy = getTwiggyInstance();

        return $twiggy->theme($name);
    }
}

if (! function_exists('setLayout')) {
    /**
     * Sets the layout for twiggy
     * @param  string $name
     * @return void
     */
    function setLayout($name)
    {
        $twiggy = getTwiggyInstance();

        return $twiggy->layout($name);
    }
}

if (! function_exists('setPageTitle')) {
    /**
     * set the title of the page
     * @param string  $title
     * @param string  $append  <optional>
     * @return void
     */
    function setPageTitle($title, $append = false)
    {
        $twiggy = getTwiggyInstance();

        if ($append)
            return $twiggy->title($title, $append);

        return $twiggy->title($title);
    }
}

if (! function_exists('appendPageTitle')) {
    /**
     * Add a title after an already set title
     * @param  string $title
     * @return void
     */
    function appendPageTitle($title)
    {
        $twiggy = getTwiggyInstance();

        return $twiggy->append($title);
    }
}

if (! function_exists('prependPageTitle')) {
    /**
     * Add a title before an already set title
     * @param  string $title
     * @return void
     */
    function prependPageTitle($title)
    {
        $twiggy = getTwiggyInstance();

        return $twiggy->prepend($title);
    }
}

if (! function_exists('setPageMeta')) {
    /**
     * Set a meta tag
     * @param string $name      name of the meta tag
     * @param string $value     content of the meta tag
     * @param string $attribute attribute of the meta tag
     * @return void
     */
    function setMetatag($name, $value, $attribute = 'name')
    {
        $twiggy = getTwiggyInstance();

        return $twiggy->meta($name, $value, $attribute);
    }
}
