<% if $SidebarContent %>
	<% if not $MinisiteParent || $HideMinisiteSidebar %>
		<section id="page_left">
	<% end_if %>
<% end_if %>

<h1>$Title</h1>
$Content
<% include Page_columns %>

<% if $SidebarContent %>
	<% if not $MinisiteParent || $HideMinisiteSidebar %>
		</section>
		<section id="page_right">
			$SidebarContent
		</section>
	<% end_if %>
<% end_if %>
