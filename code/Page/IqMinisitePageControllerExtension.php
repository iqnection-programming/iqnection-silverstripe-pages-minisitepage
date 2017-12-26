<?php

use SilverStripe\Core;
use SilverStripe\View\Requirements;

class IqMinisitePageControllerExtension extends Core\Extension
{
	public function onAfterInit()
	{
		if ($this->MinisiteParent()) 
		{
			$action = $this->owner->request->param('Action');
			$page_template = Core\ClassInfo::shortName($this->owner->dataRecord->getClassName());
			$backup_template = 'Page';
			if ($action) 
			{
				$page_template = $page_template."_".$action;
				$backup_template = $backup_template."_".$action;
			}
			$templates = $this->owner->__get('templates');
			$templates['index'] = array('MinisitePage', $page_template, $backup_template);
			$this->owner->__set('templates',$templates);
		}
	}
	
	public function updatePageCSS(&$files)
	{
		if ($this->MinisiteParent()) 
		{
			$files[] = '/css/pages/MinisitePage.css';
			$files[] = '/css/pages/MinisitePage_extension.css';
		}
	}
	
	public function updatePageJS(&$files)
	{
		if ($this->MinisiteParent()) 
		{
			$files[] = '/javascript/pages/MinisitePage.js';
			$files[] = '/javascript/pages/MinisitePage_extension.js';
		}
	}
	
	public function MinisiteParent($page=false)
	{
		$page = $page ? $page : $this->getOwner()->dataRecord;
		if ($page->ActivateMinisite) 
		{
			return $page;
		} 
		elseif ($page->Parent() && $page->ID != 0) 
		{
			return $this->MinisiteParent($page->Parent());
		} 
		else 
		{
			return false;
		}
	}

	
}
