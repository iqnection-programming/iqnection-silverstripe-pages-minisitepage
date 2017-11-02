<% if $MinisiteParent.Children %>
	<div id="minisite_sidebar" class="parent_sameheight">
		<ul id="minisite_sidebar_nav">
			<li class="minisite_title">
				<span class="mcontrol"></span>
				<h2>$MinisiteParent.Title</h2>
			</li>
			<% if $MinisiteParent.ClassName != HeadingPage %>
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
			<div id="minisite_sidebar_content">
				$SidebarContent
			</div>
		<% end_if %>
	</div><!--minisite_sidebar-->
<% end_if %>
