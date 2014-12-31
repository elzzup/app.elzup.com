<?php

class Userinfoobj {

    public $user_id;
    public $screen_name;
    public $name;
    public $img_path;
    public $point;
    public $count;
    public $text;

	function __construct($obj = NULL) {
        if (!isset($obj)) {
            return;
        }
        $this->name = $obj->name;
        $this->screen_name = $obj->screen_name;
        $this->user_id = $obj->id;
        $this->img_path = $obj->profile_image_url;
        $this->text = "";
        $this->count = 0;
	}

    public function add_str($text) {
        $this->count++;
        $this->text .= $text;
    }

    public function set_point($point) {
        $len = mb_strlen($this->text);
//        echo "<p>c:{$this->count} p: {$point} len: {$len}<br></p>";
        $this->point = round($point / max(1, $this->count), 2);
    }

    public function get_point_level() {
        $p = minmax($this->point, 0, 1000);
        return floor($p / 10);
    }

}
