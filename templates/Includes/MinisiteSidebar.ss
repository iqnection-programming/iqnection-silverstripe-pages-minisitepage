<% with MinisiteParent %>
	<% if Children %>
        <ul id="minisite_sidebar">
        	<li><a href="$Link" class="$LinkingMode">$Title</a></li>
        <% loop Children %>
        	<li><a href="$Link" class="$LinkingMode">$Title</a></li>
        <% end_loop %>
        </ul><!--minisite_sidebar-->
    <% end_if %>
<% end_with %>