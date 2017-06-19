<?php
header('Content-type:text/html;charset=utf-8');

//读取图片文件，转换成 base64 编码格式
$imageFile = 'test.jpg';
$imageInfo = getimagesize($imageFile);
$base64ImageContent = "data:{$imageInfo['mime']};base64," .  chunk_split(base64_encode(file_get_contents($imageFile)));
