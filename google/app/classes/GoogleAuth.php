<?php

class GoogleAuth{
	
	protected $client;

	public function __construct(Google_Client $googleClient = null){
		$this->client = $googleClient;

		if ($this->client) {
			$this->client->setClientId('959112029539-p4bgbdmv49277uv1pbu90ccrfkn3t1ic.apps.googleusercontent.com');
			$this->client->setClientSecret('BkcvIMcucAds175kk2r1QokY');
			$this->client->setRedirectUri('http://localhost/pxami/google/index.php');
			$this->client->setScopes('email');
			
		}
	}

	public function isLoggedIn(){
		return isset($_SESSION['access_token']);
	}

	public function getAuthUrl(){
		return $this->client->createAuthUrl();
	}

	public function checkRedirectCode(){
		if(isset($_GET['code'])){
			$this->client->authenticate($_GET['code']);

			$this->setToken($this->client->getAccessToken());

			return true;
		}

		return false;
	}

	public function setToken($token){
		$_SESSION['access_token'] = $token;

		$this->client->setAccessToken($token);
	}
}