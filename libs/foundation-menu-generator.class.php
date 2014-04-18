<?php
class MenuGenerator
{
	private $title_link;
	private $title;
	private $left = null;
	private $right = null;
	function __construct($title,$title_link='',$left=null,$right=null ) {
		$this->title = htmlspecialchars($title);
		$this->title_link = $title_link;
		$this->left = $left;
		$this->right = $right;
  }
  public function html() {
    $html = "<nav class='top-bar'>";
    $html.= "<ul class='title-area'>";
    $html.= "<li class='name'>";
    $html.= "<h1><a href='$this->title_link'>$this->title</a></h1>";
    $html.= "</li>";
    
    $html.= "<li class='toggle-topbar menu-icon'><a><span>Menu</span></a></li>";
    $html.= "</ul>";
    $html.= "<section class='top-bar-section'>";
    if ($this->left!=null)
    {
    	$html.= "<ul class='left'>";
    	$html.='<li class="divider"></li>';
      foreach($this->left as $value)
      {
      		$html.=$value->html();
      		$html.='<li class="divider"></li>';
      }
      $html.= "</ul>";
    }
    if ($this->right!=null)
    {
    	$html.= "<ul class='right'>";
      foreach($this->right as $value)
      {
					$html.=$value->html();
					$html.='<li class="divider"></li>';
      }
      $html.= "</ul>";
    }   
		$html.= "</section>";
		$html.= "</nav>";
		return $html;
  }
}
class MenuElement
{
	private $subElements = null;
	private $link = null;
	private $text = null;
	function __construct($text,$link,$subElements=null) {
		$this->text = htmlspecialchars($text);
		$this->link = $link;
		$this->subElements = $subElements;
  }
	public function html()
	{
		if($this->subElements==null)
			return "<li><a href='$this->link'>$this->text</a></li>";
		else
		{
			$html = '<li class="has-dropdown"><a href="'.$this->link.'">'.$this->text.'</a>';
			$html.= '<ul class="dropdown">';
			foreach ($this->subElements as $subElement)
			{
				$html.=$subElement->html();
			}
			$html.= '</ul>';
			$html.= '</li>';
			return $html;
		}
	}
	public function xml()
	{
		$child = new SimpleXMLElement('<li></li>');
		if ($this->subElements==null)
		{
			$child->addChild('a',$this->text)->addAttribute('href',$this->link);
		}
		else
		{
			
			$child->addAttribute('class','has-dropdown');
			$child->addChild('a',$this->text)->addAttribute('href',$this->link);
			$drop = $child->addChild('ul');
			$drop->addAttribute('class','dropdown');
			foreach ($this->subElements as $subElement)
			{
				$drop->addChild($subElement->xml());
			}
		}
		return substr($child->asXml(),strpos($child->asXml(),'?>')+2);
	}
}
class MenuImageElement
{
	private $subElements = null;
	private $link = null;
	private $image = null;
	function __construct($image,$link,$subElements=null) {
		$this->image = $image;
		$this->link = $link;
		$this->subElements = $subElements;
  }
	public function html()
	{
		if($this->subElements==null)
			return "<li><a href='$this->link'><img src='$this->image'></img></a></li>";
		else
		{
			$html = '<li class="has-dropdown"><a href="'.$this->link.'">'.$this->text.'</a>';
			$html.= '<ul class="dropdown">';
			foreach ($this->subElements as $subElement)
			{
				$html.=$subElement->html();
			}
			$html.= '</ul>';
			$html.= '</li>';
			return $html;
		}
	}
}
?>