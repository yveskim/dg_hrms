<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class About extends BaseController
{
	public function index($page = 'index_history')
	{
			if ( ! is_file(APPPATH.'/Views/f_about/history/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Registrar & Admission'; // Capitalize the first letter

			return view('f_about/history/'.$page);

	}

	public function principal($page = 'fantillo')
	{
			if ( ! is_file(APPPATH.'/Views/f_about/school_heads/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Principal'; // Capitalize the first letter

			return view('f_about/school_heads/'.$page);

	}

	public function visionMission($page = 'vision_mission')
	{
			if ( ! is_file(APPPATH.'/Views/f_about/mission_vision/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Vision & Mission'; // Capitalize the first letter

			return view('f_about/mission_vision/'.$page);

	}

	public function loyaltySong($page = 'loyalty_song_lyrics')
	{
			if ( ! is_file(APPPATH.'/Views/f_about/loyalty_song/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Loyalty Song'; // Capitalize the first letter

			return view('f_about/loyalty_song/'.$page);

	}

	public function contactUs($page = 'contact_us')
	{
			if ( ! is_file(APPPATH.'/Views/f_about/contact_us/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Contact Us'; // Capitalize the first letter

			return view('f_about/contact_us/'.$page);

	}

	public function dataPrivacy($page = 'data_privacy_agreement')
	{
			if ( ! is_file(APPPATH.'/Views/f_about/data_privacy/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Data Privacy'; // Capitalize the first letter

			return view('f_about/data_privacy/'.$page);

	}
	




}
