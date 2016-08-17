<?php
/**
* Context to construct the pages.
*/
class PageContext {

	const CHARSET ="utf-8";
	private $title;
	private $pageBody;
	private $menuOptions;
	private $scripts;
	private $styles;

	public function setTitle($newTitle) {
		$this->title = $newTitle;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setPageBody($newPageBody) {
		$this->pageBody = $newPageBody;
	}

	public function getPageBody() {
		return $this->pageBody;
	}

	public function getCharset() {
		return self::CHARSET;
	}

	public function setMenuOptions($newMenuOptions) {
		$this->menuOptions = $newMenuOptions;
	}

	public function getMenuOptions() {
		return $this->menuOptions;
	}

	public function setScripts($newScripts) {
		$this->scripts = $newScripts;
	}

	public function getScripts() {
		return $this->scripts;
	}

	public function setStyles($newStyles) {
		$this->styles = $newStyles;
	}

	public function getStyles() {
		return $this->styles;
	}

}