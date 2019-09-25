class Navigation
{
		go_back()
		{
			if(breadcrumbs_current != 0)
			{
				AJAX(breadcrumbs[breadcrumbs_current-1]);
				breadcrumbs_current = breadcrumbs_current-1;
			}
			return;
		}
		
		go_forward()
		{
			AJAX(breadcrumbs[breadcrumbs_current+1]);
			breadcrumbs_current = breadcrumbs_current+1;
			return;
		}
		
		set_button()
		{
			if(breadcrumbs_current == 0)
			{
				set_disabled("back_button");
				set_disabled("nav_buttons_back");
			}
			else
			{
				set_enabled("nav_buttons_back");
				set_enabled("back_button");
			}
			return;
		}
}
