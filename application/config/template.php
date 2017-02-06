<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * default layout
 * Location: application/views/
 */
$config['template_layout'] = 'template/layout';

/**
 * default css
 */
$config['template_css'] = array(
    'https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css' => '', //dataTables CSS
    'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css' => '' //Datepicker CSS
    // '/assets/css/index.css' => 'screen'
);

/**
 * default javascript
 * load javascript on header: FALSE
 * load javascript on footer: TRUE
 */
$config['template_js'] = array(
    // 'https://code.jquery.com/jquery-2.1.1.min.js' => FALSE,
    // '/assets/js/index.js' => TRUE
);

/**
 * default variable
 */
$config['template_vars'] = array(
    'site_description' => 'Message of Right',
    'site_keywords' => 'message, sms'
);

/**
 * default site title
 */
$config['base_title'] = 'Message of Right';

/**
 * default title separator
 */
$config['title_separator'] = ' | ';
