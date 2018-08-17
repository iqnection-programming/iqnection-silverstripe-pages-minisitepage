<?php

namespace IQnection\Minisite;

use SilverStripe\Core;
use SilverStripe\View\Requirements;

class PageControllerExtension extends Core\Extension
{
	public function onAfterInit()
	{
		if ($this->MinisiteParent()) 
		{
			$action = $this->owner->request->param('Action');
			$page_template = Core\ClassInfo::shortName($this->owner->dataRecord->getClassName());
			$pageAncestry = array_reverse(Core\ClassInfo::ancestry($this->owner->dataRecord->getClassName()),true);
			$checkTemplates = ['MinisitePage'];
			if ($action) 
			{
				foreach($pageAncestry as $pageClassName)
				{
					$checkTemplates[] = $pageClassName."_".$action;
					if ($pageClassName == \Page::class)
					{
						break;
					}
				}
			}
			foreach($pageAncestry as $pageClassName)
			{
				$checkTemplates[] = $pageClassName;
				if ($pageClassName == \Page::class)
				{
					break;
				}
			}
			$templates = $this->owner->__get('templates');
			$templates['index'] = $checkTemplates;
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
