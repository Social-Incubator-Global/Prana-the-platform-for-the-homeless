<?php

function asset($path)
{
	return DOC_ROOT . '/assets'. $path;
}

function url($uri)
{
	return  DOC_ROOT . '/' . $uri;
}
