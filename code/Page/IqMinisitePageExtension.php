<?php

use SilverStripe\ORM;
use SilverStripe\Forms;
use SilverStripe\Core;

class IqMinisitePageExtension extends ORM\DataExtension
{
	
	private static $db = array(
		"ActivateMinisite" => "Boolean",
		'HideMinisiteSidebar' => 'Boolean',
		'ShowMultiLevelMinisite' => 'Boolean'
	);
	
	public function updateCMSFields(Forms\FieldList $fields)
	{
		if (!$fields->dataFieldByName('ActivateMinisite')) 
		{
			$fields->addFieldToTab('Root.Main', $minisiteGroup = Forms\FieldGroup::create("Minisite Layout", array(
				Forms\CheckboxField::create('ActivateMinisite', 'Activate as Minisite Parent')
			)), "Title");
			if ( ($this->owner->ActivateMinisite) || ($this->owner->MinisiteParent()) )
			{
				$minisiteGroup->push( Forms\CheckboxField::create('HideMinisiteSidebar','Hide Minisite Navigation') );
			}
			if ($this->owner->ActivateMinisite)
			{
				$minisiteGroup->push( Forms\CheckboxField::create('ShowMultiLevelMinisite','Show Multi-Level Navigation') );
			}
		}
		return $fields;
	}
	
	public function MinisiteParent()
	{
		if ($this->owner->ActivateMinisite) 
		{
			return $this->owner;
		} 
		elseif ($this->owner->Parent()->Exists())
		{
			return $this->owner->Parent()->MinisiteParent();
		} 
		return false;
	}
	
}



