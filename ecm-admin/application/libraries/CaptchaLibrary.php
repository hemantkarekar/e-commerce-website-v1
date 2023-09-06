<?php

/**
 * ### Pre-requisites:
 * 
 * Libraries:
 * captcha
 * 
 * Helpers:
 * file
 * string
 */
class CaptchaLibrary
{
    public function create()
    {
        $vals = array(
            'word'          => random_string(),
            'img_path'      => './assets/captcha-images/',
            'img_url'       => base_url('assets/captcha-images/'),
            'font_path'     => base_url('assets/fonts/') . 'texb.ttf',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
        delete_files('./assets/captcha-images/');
        $cap = create_captcha($vals);
        return $cap;
    }
}
