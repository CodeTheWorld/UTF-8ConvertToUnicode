<?php
/**
 * Created by deshengkong.
 * Date: 14-10-8
 * Time: 下午6:42
 */
class Converter {
    /**
     * 获取字符的unicode
     * @param string $char
     * @param string $charset
     *
     * @return int unicode
     */
    public static function convert($char, $charset = 'utf-8') {
        if($charset != 'utf-8'){ //将字符编码转换为utf-8再获取unicode.
            $char = iconv($charset, 'utf-8', $char);
        }
        switch(strlen($char)) {
            case 1:
                return ord($char);
            case 2:
                $n = (ord($char[0]) & 0x1f) << 6;
                $n += ord($char[1]) & 0x3f;
                return $n;
            case 3:
                $n = (ord($char[0]) & 0x0f) << 12;
                $n += (ord($char[1]) & 0x3f) << 6;
                $n += ord($char[2]) & 0x3f;
                return $n;
            case 4:
                $n = (ord($char[0]) & 0x07) << 18;
                $n += (ord($char[1]) & 0x3f) << 12;
                $n += (ord($char[2]) & 0x3f) << 6;
                $n += ord($char[3]) & 0x3f;
                return $n;
            case 5:
                $n = (ord($char[0]) & 0x03) << 24;
                $n += (ord($char[1]) & 0x3f) << 18;
                $n += (ord($char[2]) & 0x3f) << 12;
                $n += (ord($char[3]) & 0x3f) << 6;
                $n += ord($char[4]) & 0x3f;
                return $n;
            case 6:
                $n = (ord($char[0]) & 0x01) << 30;
                $n += (ord($char[1]) & 0x3f) << 24;
                $n += (ord($char[2]) & 0x3f) << 18;
                $n += (ord($char[3]) & 0x3f) << 12;
                $n += (ord($char[4]) & 0x3f) << 6;
                $n += ord($char[5]) & 0x3f;
                return $n;
        }
    }
}
