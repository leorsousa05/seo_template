<?php

class SeoTextProvider
{
	private $currentRouteSeoContent = [];
	private $seoJsonArray = [];

	function __construct($pageUri)
	{
		$seoDataJson = json_decode(file_get_contents('seoData.json'));
		$currentRouteSeoContent = [];
		$seoJsonArray = [];

		foreach ($seoDataJson as $data) {
			array_push($seoJsonArray, $data);
		}

		foreach ($seoDataJson as $routeData) {
			if ($routeData["link"] == $pageUri) {
				$currentRouteSeoContent = $routeData;
				break;
			}
		}

		$this->seoJsonArray = $seoJsonArray;
		$this->currentRouteSeoContent = $currentRouteSeoContent;
	}

	public function getCurrentRouteSeoContent()
	{
		return $this->currentRouteSeoContent;
	}

	public function getSeoJsonArray()
	{
		return $this->seoJsonArray;
	}
}
