<?php

function _log($data)
{
    Yii::info(\yii\helpers\VarDumper::dumpAsString($data, 5), '_');
}
function _end($data)
{
    echo \yii\helpers\VarDumper::dumpAsString($data, 5, true);
    exit();
}