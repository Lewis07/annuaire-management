<?php

class Site
{
	public static function redirect(string $location): void
	{
		header('Location: ' . $location);
	}

	public static function title($title): string
	{
		if (!empty($title)) {
			$title = $title;
		} else {
			$title = "Annuaire";
		}
		return $title;
	}
}
