<?php
/**
 * Description of FileManager
 *
 * @author MARTIN
 */
class FileManager {

    public static function read($filename) {
        if (file_exists($filename)) {
            $content = '';
            $file = fopen($filename, "r");
            while (!feof($file)) {
                $content .= fgets($file);
            }
            fclose($file);
            return $content;
        }
        return NULL;
    }
}
