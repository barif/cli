<?php

class Timer {
    public static $start;
    public static $end;
    public static $col;
    protected static $options;
    protected static $interval;

    public static function init($options) {
        self::$start = self::utime();
        self::$options = $options;
        
        self::$col = new Colors();
        echo self::diff()."Start! \n";
//        echo "\033[31m some colored text \033[0m some white text \n";
    }
    
    public static function reset() {
        self::$interval = self::utime();
    }
    
//    public static function millitime() {
//        $microtime = microtime();
//        $comps = explode(' ', $microtime);
//
//        return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
//    }

    public static function diff($start = null) {
        $start = ($start == null) ? self::$start : $start;
        self::$end = $end =  self::utime();
        $diff = $end-$start;
        $sec = intval($diff);
        $micro = $diff - $sec;
        $final = strftime('%T', mktime(0, 0, $sec)) . str_replace('0.', '.', sprintf('%.3f', $micro));

        return $final."\t";
    }
    
    public static function interval() {
        $start = self::$interval;
        $end =  self::utime();
        $diff = $end-$start;
        $sec = intval($diff);
        $micro = $diff - $sec;
        $final = strftime('%S', mktime(0, 0, $sec)) . str_replace('0.', '.', sprintf('%.5f', $micro));

        return $final;
    }
    
    public static function utime() {
      return (float) (vsprintf('%d.%06d', gettimeofday()));
    }
}