<?php
enum FontCDNImporter
{
	case GOOGLE;
	case CDNFONTS;
}

class Font
{
	private $url;
	private $type;

	public function __construct($url, $type)
	{
		$this->url = $url;
		$this->type = $type;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getType()
	{
		return $this->type;
	}
}
