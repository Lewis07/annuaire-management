<?php

class MainController extends Controller
{
	public function index()
	{
		Site::redirect('/categorie');
	}
}
