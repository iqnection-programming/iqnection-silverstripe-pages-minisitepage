<?php

namespace IQnection\Minisite;

use SilverStripe\Core;
use SilverStripe\View\Requirements;

class PageControllerExtension extends Core\Extension
{
	public function showMinisite()
	{
		return ( ($this->MinisiteParent()) && (!$this->owner->HideMinisiteSidebar) );
	}
	
	public function onAfterInit()
	{
		if ($this->showMinisite()) 
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
		if ($this->showMinisite()) 
		{
			$files[] = '/css/pages/MinisitePage.css';
			$files[] = '/css/pages/MinisitePage_extension.css';
		}
	}
	
	public function updatePageJS(&$files)
	{
		if ($this->showMinisite()) 
		{
			$files[] = '/javascript/pages/MinisitePage.js';
			$files[] = '/javascript/pages/MinisitePage_extension.js';
		}
	}
	
	public function MinisiteParent()
	{
		if ($this->owner->ActivateMinisite) 
		{
			return $this->owner;
		} 
		elseif ( ($this->owner->Parent()->Exists()) && ($this->owner->Parent()->hasMethod('MinisiteParent')) )
		{
			return $this->owner->Parent()->MinisiteParent();
		} 
		return false;
	}
}
