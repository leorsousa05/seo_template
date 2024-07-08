<?php

class SeoTextProvider
{
	private $currentRouteSeoContent;
	private $currentSeoLink;
	private $seoJsonArray = [];

	function __construct($pageUri)
	{
		$seoDataJson = json_decode(file_get_contents('seoData.json'));
		$seoJsonArray = [];

		foreach ($seoDataJson as $data) {
			array_push($seoJsonArray, $data);
		}


		foreach (array_keys(get_object_vars($seoDataJson)) as $routeData) {
			if ("/" . $routeData == $pageUri) {
				$this->currentSeoLink = $routeData;
				$this->currentRouteSeoContent = json_decode(file_get_contents('seoData.json'), true)[$routeData];
				break;
			}
		}

		$this->seoJsonArray = $seoJsonArray;
	}

	public function getCurrentRouteSeoContent()
	{
		return $this->currentRouteSeoContent;
	}

	public function getSeoJsonArray()
	{
		return $this->seoJsonArray;
	}

	public function getCurrentSeoLink()
	{
		return $this->currentSeoLink;
	}
}
