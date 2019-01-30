<% if $MinisiteParent.Children %>
	<div class="minisite-sidebar">
		<ul id="minisite_sidebar_nav">
			<li class="minisite_title">
				<h2>$MinisiteParent.Title</h2>
			</li>
			<% if $MinisiteParent.ClassName != IQnection\HeadingPage\HeadingPage %>
				<li class="mobile"><a href="$MinisiteParent.Link" class="$MinisiteParent.LinkingMode">$MinisiteParent.MenuTitle</a></li>
			<% end_if %>
			<% loop $MinisiteParent.Children %>
				<% if $Children && $Parent.ShowMultiLevelMinisite %>
					<li class="$LinkingMode children">
						<span class="control"></span>
						<a href="$Link" class="$LinkingMode">$MenuTitle</a>
						<ul>
							<% loop $Children %>
								<li><a href="$Link" class="$LinkingMode">$MenuTitle</a></li>
							<% end_loop %>
						</ul>
					</li>
				<% else %>
					<li class="$LinkingMode"><a href="$Link" class="$LinkingMode">$MenuTitle</a></li>
				<% end_if %>
			<% end_loop %>
		</ul><!--minisite_sidebar_nav-->
		<% if $SidebarContent && not $HideMinisiteSidebar %>
			<div class="minisite-sidebar-content">
				$SidebarContent
			</div>
		<% end_if %>
	</div><!--minisite_sidebar-->
<% end_if %>
