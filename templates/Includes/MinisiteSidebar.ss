<% with MinisiteParent %>
	<% if Children %>
		<div id="minisite_sidebar" class="parent_sameheight">
			<ul id="minisite_sidebar_nav">
				<li class="minisite_title"><h2><a href="$Link">$Title</a></h2></li>
			<% loop Children %>
				<li><a href="$Link" class="$LinkingMode">$Title</a></li>
			<% end_loop %>
			</ul><!--minisite_sidebar_nav-->
		</div><!--minisite_sidebar-->
    <% end_if %>
<% end_with %>