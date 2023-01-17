<?php

require_once('Main.php');

class Home extends Main
{
    public function collectDataHome()
    {
        try {
            $sql = "SELECT content_id, Home_title, Home_starter_content, Home_main_content FROM Content WHERE content_id = 1";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update($home_title, $home_start_content, $home_main_content)
    {
        try {
            $sql = "UPDATE Content SET `Home_title` = '{$home_title}', `Home_starter_content` = '{$home_start_content}', `Home_main_content` = '{$home_main_content}' WHERE `content_id` = 1";
            $result = self::updateData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}