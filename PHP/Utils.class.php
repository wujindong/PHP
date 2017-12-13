<?php

/**
 * 工具类
 * Class Utils
 */
class Utils{

    /**
     * 判断数组的维度
     * @param $array
     * @return int|mixed
     */
    public static function array_depth($array) {
        if(!is_array($array)) return 0;
        $max_depth = 1;
        foreach ($array as $value) {
            if (is_array($value)) {
                $depth = self::array_depth($value) + 1;
                $max_depth = max($max_depth,$depth);
            }
        }
        return $max_depth;
    }

    /**
     * 字符串转byte数组
     * @param $str
     * @return array
     */
    function string2bytes($str){
        $bytes=array();
        for ($i=0; $i < strlen($str); $i++) {
            $bytes[]=ord($str[$i]);
        }
        return $bytes;
    }
}

