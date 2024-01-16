<?php
namespace zcrmsdk\oauth\utility;

use zcrmsdk\crm\utility\ZCRMConfigUtil;

class OAuthLogger
{

    public static function writeToFile($msg)
    {
        $file = ZCRMConfigUtil::getConfigValue(ZohoOAuthConstants::LOG_FILE);
        $file = $file ?: dirname(__FILE__) . "/OAuth.log";

        $filePointer = fopen($file, "a");
        fwrite($filePointer, sprintf("%s %s\n", date("Y-m-d H:i:s"), $msg));
        fclose($filePointer);
    }

    public static function warn($msg)
    {
        self::writeToFile("WARNING: $msg");
    }

    public static function info($msg)
    {
        self::writeToFile("INFO: $msg");
    }

    public static function severe($msg)
    {
        self::writeToFile("SEVERE: $msg");
    }
    
    public static function err($msg)
    {
        self::writeToFile("ERROR: $msg");
    }
    
    public static function debug($msg)
    {
        self::writeToFile("DEBUG: $msg");
    }
}