<?php
abstract class Router
{
	abstract public function get_route(AltoRouter $router): AltoRouter;
}

class AssetsRequest extends Router
{
	private $path, $content_type;

	public function __construct(string $path, string $content_type)
	{
		$this->path = WEBSITE_FOLDER . $path;
		$this->content_type = $content_type;
	}

	public function get_route(AltoRouter $router): AltoRouter
	{
		$router->map('GET', $this->path . "[*:file]", function ($archive) {

			header($this->content_type);

			readfile($_SERVER["DOCUMENT_ROOT"] . $this->path . $archive);

			exit();
		});
		return $router;
	}
}

class PagesRequest extends Router
{
	private $path, $page_archive_path, $is_dinamic;

	public function __construct(string $path, string $page_archive_path, bool $is_dynamic = false)
	{
		$this->path = WEBSITE_FOLDER . $path;
		$this->page_archive_path = $page_archive_path;
		$this->is_dinamic = $is_dynamic;
	}

	public function get_route(AltoRouter $router): AltoRouter
	{
		if ($this->is_dinamic) {
			$router->map("GET", $this->path . '[:param]', function ($param) {
				require($this->page_archive_path);
			});
		} else {
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				$router->map("POST", $this->path, function () {
					require($this->page_archive_path);
				});
			} else {
				$router->map("GET", $this->path, function () {
					require($this->page_archive_path);
				});
			}
		}

		return $router;
	}
}

class SecondaryArchivesRequest extends Router
{
	private $path, $content_type;

	public function __construct(string $path, string $content_type)
	{
		$this->path = WEBSITE_FOLDER . $path;
		$this->content_type = $content_type;
	}

	public function get_route(AltoRouter $router): AltoRouter
	{
		$router->map("GET", $this->path . "[*:file]", function ($archive) {
			header($this->content_type);

			readfile($_SERVER["DOCUMENT_ROOT"] . $this->path . $archive);

			exit();
		});
		return $router;
	}
}

class DynamicFileRequest extends Router
{
	private $path, $content_type, $callback;

	public function __construct(string $path, string $content_type, callable $callback)
	{
		$this->path = WEBSITE_FOLDER . $path; // Ensure WEBSITE_FOLDER is "/"
		$this->content_type = $content_type;
		$this->callback = $callback;
	}

	public function get_route(AltoRouter $router): AltoRouter
	{
		// Make sure not to use wildcards here if you want a direct match
		$router->map('GET', $this->path, function () {
			header($this->content_type);
			call_user_func($this->callback);
			exit();
		});

		return $router;
	}
}
