<?php
namespace zcrmsdk\crm\utility;

class Logger
{

    public static function writeToFile($msg)
    {
        // First use log file
        $file = ZCRMConfigUtil::getConfigValue(APIConstants::LOG_FILE);

        // Then attempt to use the log path
        if(ZCRMConfigUtil::getConfigValue('applicationLogFilePath'))
        {
            $file = $file ?: rtrim(ZCRMConfigUtil::getConfigValue('applicationLogFilePath'), '/' ) . '/ZCRMClientLibrary.log';
        }

        // Fallback to default
        $file = $file ?: dirname(__FILE__) . "/ZCRMClientLibrary.log";

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