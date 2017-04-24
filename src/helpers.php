<?php

function getCJK(){
    return '' .
    '\x{2e80}-\x{2eff}' .
    '\x{2f00}-\x{2fdf}' .
    '\x{3040}-\x{309f}' .
    '\x{30a0}-\x{30ff}' .
    '\x{3100}-\x{312f}' .
    '\x{3200}-\x{32ff}' .
    '\x{3400}-\x{4dbf}' .
    '\x{4e00}-\x{9fff}' .
    '\x{f900}-\x{faff}';
}

//获得全角字符
function getDBC(){
    return [
        '０' , '１' , '２' , '３' , '４' ,
        '５' , '６' , '７' , '８' , '９' ,
        'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' ,
        'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' ,
        'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' ,
        'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' ,
        'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' ,
        'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' ,
        'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' ,
        'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' ,
        'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' ,
        'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' ,
        'ｙ' , 'ｚ' , '－' , '　' , '／' ,
        '％' , '＃' , '＠' , '＆' , '＜' ,
        '＞' , '［' , '］' , '｛' , '｝' ,
        '＼' , '｜' , '＋' , '＝' , '＿' ,
        '＾' , '￣' , '｀'
    ];
}

//获得半角字符
function getSBC(){
    return [
        '0', '1', '2', '3', '4',
        '5', '6', '7', '8', '9',
        'A', 'B', 'C', 'D', 'E',
        'F', 'G', 'H', 'I', 'J',
        'K', 'L', 'M', 'N', 'O',
        'P', 'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X', 'Y',
        'Z', 'a', 'b', 'c', 'd',
        'e', 'f', 'g', 'h', 'i',
        'j', 'k', 'l', 'm', 'n',
        'o', 'p', 'q', 'r', 's',
        't', 'u', 'v', 'w', 'x',
        'y', 'z', '-', ' ', '/',
        '%', '#', '@', '&', '<',
        '>', '[', ']', '{', '}',
        '\\','|', '+', '=', '_',
        '^', '~', '`'
    ];
}

