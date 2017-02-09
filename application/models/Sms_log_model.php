<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_log_model extends MY_Model {
        public $primary_key = 'sms_log_id';
        protected $soft_delete = TRUE;
        public $belongs_to = array( 'application' );        
}