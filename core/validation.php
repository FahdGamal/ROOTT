<?php

function requiredVali($input)
{
    if (empty($input)) {
        return false;
    } else {
        return true;
    }
}

function minVali($input, $length)
{
    if (strlen($input) < $length) {
        return false;
    } else {
        return true;
    }
}

function maxVali($input, $length)
{
    if (strlen($input) > $length) {
        return false;
    } else {
        return true;
    }
}

function emailVali($input)
{
    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}



