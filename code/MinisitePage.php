<?php
	
	class IQMinisite_Page extends Extension
	{				
		
		private static $db = array(
			"ActivateMinisite" => "Boolean"
		);	
		
		public function updateCMSFields(FieldList $fields)
		{
			$fields->addFieldToTab('Root.Main', new FieldGroup("Minisite Layout", array(
				new CheckboxField('ActivateMinisite','Activate'),
			)), "Title");
			return $fields;
		}
		
		public function updateSettingsFields(FieldList $fields)
		{			
			return $fields;
		}
		
	}
	
	class IQMinisite_Page_Controller extends Extension 
	{
		
		public function onAfterInit() 
		{
			if($this->MinisiteParent())
			{
				$action = $this->owner->request->param('Action');
				$page_template = $this->owner->dataRecord->ClassName;
				$backup_template = 'Page';
				if($action)
				{
					$page_template = $page_template."_".$action;
					$backup_template = $backup_template."_".$action;
				}
				$this->owner->templates['index'] = array('MinisitePage', $page_template, $backup_template);
				Requirements::css("iq-minisitepage/css/pages/MinisitePage.css");
				Requirements::css("themes/mysite/css/pages/MinisitePage.css");
			}
		}
		
		public function MinisiteParent($page=false)
		{
			$page = $page ? $page : $this->getOwner()->dataRecord;
			if($page->ActivateMinisite)
			{
				return $page;	
			}
			else if ($page->Parent() && $page->ID != 0)
			{
				return $this->MinisiteParent($page->Parent());
			}			
			else
			{
				return false;	
			}
		}
		
	}