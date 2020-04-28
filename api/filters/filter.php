<?php


class Filter
{
    public static function filtering($id, $content){
        switch ($id) {
            case 0:  return self::parse($content, "`post`.`cooktime`");;
            case 1: return self::parse($content, "`cuisine`.`name`");
            case 2: return self::parse($content, "`category`.`name`");
            case 3: return self::parse($content, "`assignment`.`name`");
            case 4: return self::parse($content, "`ingredient`.`name`");
        }
    }

    private static function parse($array, $statement) {
        $output = "";
        $n = count($array);

        for ($i = 0; $i < $n; $i++) {
            $output .= $statement." = \"".$array[$i]."\"";
            if($i != $n-1) $output .= " OR ";
        }

        return trim($output);
    }
}