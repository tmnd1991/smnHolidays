<?php
	class OrbitGenerator
	{
		private $images;
		public function __construct($images)
		{
			$this->images = $images;
		}
		public function html()
		{
			$html = new DOMDocument();
			$slideShowWrapper = $html->createElement('div');
			$html->appendChild($slideShowWrapper);
			$slideShowWrapper->setAttribute('class','slideshow-wrapper');
			$preloader = $html->createElement('div');
			$preloader->setAttribute('class',"preloader");
			$slideShowWrapper->appendChild($preloader);
			$orbit = $html->createElement('ul');
			$slideShowWrapper->appendChild($orbit);
			$orbit->setAttribute('data-orbit',"");
			$orbit->setAttribute('data-options','timer_speed: 5000; slide_number: false; pause_on_hover: false; navigation_arrows: false; timer: true; bullets: false;');
			foreach($this->images as $img)
			{
				$li = $html->createElement('li');
				$image = $html->createElement('img');
				$li->appendChild($image);
				$orbit->appendChild($li);
				$image->setAttribute('src',$img->url);
				$image->setAttribute('alt',$img->alt);
			}
			return $html->saveHTML();
		}
	}
	class Image
	{
		public $alt='';
		public $url='';
		public function __construct($url,$alt='')
		{
			$this->url=$url;
			$this->alt=$alt;
		}
	}
?>