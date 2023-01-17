<?php

require_once 'Main.php';


class Content extends Main
{

    public function readallAboutContent($content_id) {
        try{

            $sql =  "SELECT `About_title`, `About_main_content`, `About_contact_info` FROM `Content`  WHERE `content_id`='$content_id'";
            $results = self::readsData($sql);

            return $results;

        } catch (Exception $e){
            throw $e;
        }
    }

    public function updateContent($content_id, $about_title, $about_main_content, $about_contact_info)
    {

        try {

            $sql = "UPDATE `Content` SET `About_title`='{$about_title}', `About_main_content`='{$about_main_content}', `About_contact_info`='{$about_contact_info}' WHERE `content_id`='1'";
            $results = self::updateData($sql);
            return $results;

        } catch (Exception $e) {
            throw $e;
        }
    }


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

    public function collectDataAboutus()
    {
        try {
            $sql = "SELECT content_id, About_title, About_main_content, About_contact_info FROM Content WHERE content_id = 1";
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