
<%-- Is there sidebar content --%>
<% if $ShowSidebar %>

	<%-- should we display the minisite sidebar --%>
	<% if not $MinisiteParent || $HideMinisiteSidebar %>
		
		<%-- logic says to display the page content as a normal sidebar layout --%>
		<div id="sidebar-layout">
			<section id="page_left">
				<h1>$Title</h1>
				$Content
				<% include Page_columns %>
			</section>
			<section id="page_right">
				<% include PageSidebar %>
			</section>
		</div>
		
	<% else %>
		
		<%-- we're showing the minisite sidebar, which contains the sidebar content, display the base page layout --%>
		<h1>$Title</h1>
		$Content
		<% include Page_columns %>
	
	<% end_if %>
		
<% else %>

	<%-- no sidebar content, display the page layout as normal --%>
    <h1>$Title</h1>
    $Content
    <% include Page_columns %>
	
<% end_if %>


