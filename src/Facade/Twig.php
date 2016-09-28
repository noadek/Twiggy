<?php
/**
 * Twiggy - Twig template engine implementation for Laravel
 *
 * Based on Edmundas Kondrašovas Twiggy for CodeIgniter
 *
 * @author Adeniyi Adekoya <noadek@hotmail.com>
 */

namespace Twiggy\Facade;

use Illuminate\Support\Facades\Facade;

class Twig extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'twiggy';
    }

}
