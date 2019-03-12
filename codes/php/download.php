<?php
function download($data)
{
    header('Content-type: application/octet-stream');
    header('Accept-Ranges: bytes');
    header('Accept-Length:' . strlen($data));
    header('Content-Disposition: attachment; filename="fileName";filename*=utf-8\'\'fileName');
    echo $data;
}
