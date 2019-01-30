<% include DocumentHead %>

    <% include Header %>
    
    <div id="main-wrap" class="wrap">
    	<div id="main" class="inside">
        	<div id="page_type" class="internal minisite typography">
				<div id="minisite-layout">
					<% if not $HideMinisiteSidebar %>
						<div class="minisite-content">
							$Layout
						</div>
						<% include MinisiteSidebar %>
					<% else %>
						$Layout
					<% end_if %>
				</div>
            </div>
        </div><!--main-->
    </div><!--main_wrap-->
    
    <% include Footer %>

<% include DocumentFoot %>