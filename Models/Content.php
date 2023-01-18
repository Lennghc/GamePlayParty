<?php

require_once 'Main.php';


class Content extends Main
{

    public function updateContent($content_id, $content_title, $content_main, $content_extra)
    {

        try {

            $sql = "UPDATE `Content` SET `content_title`='{$content_title}', `content_main`='{$content_main}', `content_extra`='{$content_extra}' WHERE `content_id`= $content_id";
            $results = self::updateData($sql);
            return $results;

        } catch (Exception $e) {
            throw $e;
        }
    }


    public function collectContentPage($content_id)
    {
        try {
            $sql = "SELECT content_id, content_title ,content_main, content_extra FROM Content WHERE content_id = $content_id";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}