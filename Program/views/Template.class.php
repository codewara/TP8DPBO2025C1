<?php

class Template {
    var $file = "";
    var $content = "";

    function __construct($file = "") {
        $this->file = $file;
        $this->content = implode("", @file($file));
    }

    function clear () { $this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content); }

    function write () {
        $this->clear ();
        print $this->content;
    }

    function getContent () {
        $this->clear ();
        return $this->content;
    }

    function replace ($old = '', $new = '') {
        if (is_int ($new)) $value = sprintf("%d", $new);
        else if (is_float ($new)) $value = sprintf("%f", $new);
        else if (is_array ($new)) {
            $value = '';
            foreach ($new as $item) $value .= $item . ' ';
        } else $value = $new;
        $this->content = preg_replace("/$old/", $value, $this->content);
    }
}