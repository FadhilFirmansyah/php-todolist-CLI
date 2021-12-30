<?php
namespace Util{
    class Helper{
        public static function input(string $info){
            echo "$info: ";
            $output = fgets(STDIN);
            return trim($output);
        }
    }
}
?>