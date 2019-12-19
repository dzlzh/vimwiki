<?php

function arraySort($array, $key, $sort = 'asc')
{
    $sort = $sort === 'asc' ? SORT_ASC : SORT_DESC;
    array_multisort(array_column($array, $key), $sort, $array);
    return $array;
}
