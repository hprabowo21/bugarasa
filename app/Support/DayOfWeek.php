<?php
namespace App\Support;
final class DayOfWeek {
    public const MAP = [1=>'Senin',2=>'Selasa',3=>'Rabu',4=>'Kamis',5=>'Jumat'];
    public static function label(int $d): string { return self::MAP[$d] ?? (string)$d; }
    public static function options(): array { return array_map(fn($k,$v)=>['value'=>$k,'label'=>$v], array_keys(self::MAP), self::MAP); }
}
