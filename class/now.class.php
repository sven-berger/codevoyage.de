<?php

class Now {
    public static function datum() {
        return date("d.m.Y"); // Datum zurückgeben
    }

    public static function uhrzeit() {
        return date("H:i"); // Uhrzeit zurückgeben
    }

    public static function tag() {
        $tag = date("l");
        $tage = [
            "Monday" => "Montag",
            "Tuesday" => "Dienstag",
            "Wednesday" => "Mittwoch",
            "Thursday" => "Donnerstag",
            "Friday" => "Freitag",
            "Saturday" => "Samstag",
            "Sunday" => "Sonntag"
        ];
        return $tage[$tag]; // Den passenden deutschen Wochentag zurückgeben
    }
}