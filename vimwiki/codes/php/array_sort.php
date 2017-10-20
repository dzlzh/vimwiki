<?php

function arraySort($array, $keys, $sort = 'asc')
{
    $sort === 'desc' 
        ? array_multisort(array_column($array, $keys), SORT_DESC, $array)
        : array_multisort(array_column($array, $keys), SORT_ASC, $array);
    return $array;
}
