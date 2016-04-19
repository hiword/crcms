<?php

use Simon\Mail\Events\Mail;
if (!function_exists('mailer'))
{
	function mailer($template,$email,array $data = [],$subject = null)
	{
		event(new Mail($template, $email,$data,$subject));
	}
}