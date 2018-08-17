<% include DocumentHead %>

    <% include Header %>
    
    <div id="main-wrap" class="wrap">
    	<div id="main" class="inside">
        	<div id="page_type" class="internal minisite typography">
				<div id="minisite-layout">
					<% if not $HideMinisiteSidebar %>
						<% include MinisiteSidebar %>
						<div class="minisite-content">
							$Layout
						</div>
					<% else %>
						$Layout
					<% end_if %>
				</div>
            </div>
        </div><!--main-->
    </div><!--main_wrap-->
    
    <% include Footer %>

<% include DocumentFoot %>