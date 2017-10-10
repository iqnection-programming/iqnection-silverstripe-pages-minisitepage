<% include DocumentHead %>

    <% include Header %>
    
    <div id="main_wrap" class="wrap">
    	<div id="main">
        	<div id="page_type" class="internal minisite typography">
            	<% if not $HideMinisiteSidebar %>
					<% include MinisiteSidebar %>
					<div id="minisite_right">
				<% end_if %>
	                    $Layout
                <% if not $HideMinisiteSidebar %>
					</div><!--minisite_right-->
				<% end_if %>
            </div>
        </div><!--main-->
    </div><!--main_wrap-->
    
    <% include Footer %>

<% include DocumentFoot %>