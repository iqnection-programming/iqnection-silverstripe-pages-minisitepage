<?php

class IQMinisite_Page extends Extension
{
	
	private static $db = array(
		"ActivateMinisite" => "Boolean",
		'HideMinisiteSidebar' => 'Boolean',
		'ShowMultiLevelMinisite' => 'Boolean'
	);
	
	public function updateCMSFields(FieldList $fields)
	{
		if (!$fields->dataFieldByName('ActivateMinisite')) 
		{
			$fields->addFieldToTab('Root.Main', $minisiteGroup = FieldGroup::create("Minisite Layout", array(
				CheckboxField::create('ActivateMinisite', 'Activate as Minisite Parent')
			)), "Title");
			if ( ($this->ActivateMinisite) || ($this->MinisiteParent()) )
			{
				$minisiteGroup->push( CheckboxField::create('HideMinisiteSidebar','Hide Minisite Navigation') );
			}
			if ($this->ActivateMinisite)
			{
				$minisiteGroup->push( CheckboxField::create('ShowMultiLevelMinisite','Show Multi-Level Navigation') );
			}
		}
		return $fields;
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

class IQMinisite_Page_Controller extends Extension
{
	public function onAfterInit()
	{
		if ($this->MinisiteParent()) 
		{
			$action = $this->owner->request->param('Action');
			$page_template = $this->owner->dataRecord->ClassName;
			$backup_template = 'Page';
			if ($action) 
			{
				$page_template = $page_template."_".$action;
				$backup_template = $backup_template."_".$action;
			}
			$this->owner->templates['index'] = array('MinisitePage', $page_template, $backup_template);
			Requirements::css("iq-minisitepage/javascript/pages/MinisitePage.js");
			Requirements::javascript("themes/mysite/javascript/pages/MinisitePage.js");
			Requirements::css("iq-minisitepage/css/pages/MinisitePage.css");
			Requirements::css("themes/mysite/css/pages/MinisitePage.css");
		}
	}
	
}
