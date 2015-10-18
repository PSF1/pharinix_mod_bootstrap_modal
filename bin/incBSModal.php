<?php
if (!defined("CMS_VERSION")) { header("HTTP/1.0 404 Not Found"); die(""); }

if (!class_exists("commandIncBSModal")) {
    class commandIncBSModal extends driverCommand {

        public static function runMe(&$params, $debug = true) {
            $path = driverCommand::run('modGetPath', array(
                'name' => 'pharinix_mod_bootstrap_modal'
            ));
            $path = $path['path'];
            echo '<link href="'.CMS_DEFAULT_URL_BASE.$path.'css/bootstrap-modal-bs3patch.css" rel="stylesheet" />';
            echo '<link href="'.CMS_DEFAULT_URL_BASE.$path.'css/bootstrap-modal.css" rel="stylesheet" />';
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path.'js/bootstrap-modalmanager.js"></script>';
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path.'js/bootstrap-modal.js"></script>';
        }

        public static function getHelp() {
            return array(
                "package" => "pharinix_mod_bootstrap_modal",
                "description" => __("Print HTML includes to Bootstrap modal."), 
                "parameters" => array(), 
                "response" => array(),
                "type" => array(
                    "parameters" => array(), 
                    "response" => array(),
                ),
                "echo" => true
            );
        }
        
        public static function getAccess($ignore = "") {
            $me = __FILE__;
            return parent::getAccess($me);
        }
        
        public static function getAccessFlags() {
            return driverUser::PERMISSION_FILE_ALL_EXECUTE;
        }
    }
}
return new commandIncBSModal();