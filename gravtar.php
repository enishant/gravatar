<?php
	$email = 'user@example.com'; // This email must be registered at gravatar.com to get gravatar profile for it.
	$email = trim($email);
	$email = strtolower($email);
	$email_hash = md5( $email );
	//$email_hash	= '767fc9c115a1b989744c755db47feb60';	// Matt

	$gravatar_url = 'http://en.gravatar.com/' . $email_hash . '.php';
	$str = file_get_contents($gravatar_url);
	$profile = unserialize( $str );

	if(!empty($profile['entry'][0]['id']))
	{
		echo '<strong>Profile Information:</strong><br>';
		echo 'ID :  ' . $profile['entry'][0]['id'] . '<br>';
	}

	if(!empty($profile['entry'][0]['preferredUsername']))
	{
		echo 'Username : ' . $profile['entry'][0]['preferredUsername'] . '<br>';
	}

	if(!empty($profile['entry'][0]['profileUrl']))
	{
		echo 'Profile : ' . $profile['entry'][0]['profileUrl'] . '<br>';
	}

	if(!empty($profile['entry'][0]['displayName']))
	{	
		echo 'Name : ' . $profile['entry'][0]['displayName'] . '<br>';
	}

	if(!empty($profile['entry'][0]['photos']))
	{
		echo '<hr>';
		echo '<strong>Gravatar(s):</strong><br>';
		for($i=0;$i<count($profile['entry'][0]['photos']);$i++)
		{
			echo '<img src="' . $profile['entry'][0]['photos'][$i]['value'] . '"> ';
		}		
	}

	if(!empty($profile['entry'][0]['urls']))
	{	
		echo '<hr>';
		echo '<strong>Websites:</strong><br>';
		for($i=0;$i<count($profile['entry'][0]['urls']);$i++)
		{
			echo '<a href="' . $profile['entry'][0]['urls'][$i]['value'] . '">' . $profile['entry'][0]['urls'][$i]['title'] . '</a><br>';
		}
	}

	if(!empty($profile['entry'][0]['accounts']))
	{		
		echo '<hr>';
		echo '<strong>Social Accounts:</strong><br>';
		for($i=0;$i<count($profile['entry'][0]['accounts']);$i++)
		{
			echo '<a href="' . $profile['entry'][0]['accounts'][$i]['url'] .'">' . $profile['entry'][0]['accounts'][$i]['display'] . '</a><br>';
		}
	}

	echo '<hr>';	
?>