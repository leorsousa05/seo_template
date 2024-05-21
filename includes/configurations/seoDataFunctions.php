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
			array_push($seoJsonArr, $data);
		}

		foreach ($seoDataJson as $key => $routeData) {
			if ($routeData["link"] == $pageUri) {
				$currentRouteSeoContent = $routeData;
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
