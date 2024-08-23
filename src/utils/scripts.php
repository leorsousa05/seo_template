<?php foreach ($websiteScripts as $key => $script) {
	switch ($script->getType()) {
		case DefaultAssetsImports::CRITICAL:
			echo "<script type=\"module\" src=\"" . $script->getUrl() . "\" async></script>";
			break;
		case DefaultAssetsImports::NONCRITICAL:
			echo "<script type=\"module\" src=\"" . $script->getUrl() . "\" defer></script>";
			break;
	}
}
