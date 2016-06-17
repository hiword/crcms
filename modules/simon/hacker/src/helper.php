<?php
if (!function_exists('scripts_url'))
{
	function script_url($file)
	{
		return config('app.url').'/scripts/'.$file;
	}
}