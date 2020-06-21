<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TorattoAjax extends Controller
{
    function toratto_quotation_form() {
        wp_send_json('retorno ajax correcto');
    }
}
