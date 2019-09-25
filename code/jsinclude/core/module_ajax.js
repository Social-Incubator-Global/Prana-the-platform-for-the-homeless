function AJAX(content)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState === 4 && this.status === 200)
        {
            //itm created exclusively so that response InnerHTML .js can be executed
            var itm = get_item("lang_div");
            var js_type = false;
            itm.innerHTML = this.responseText;
            
			if(js_type)
			{
				var x = itm.getElementsByTagName("script");
				for(var i=0; i < x.length; i++)
				{
					window.eval(x[i].text);
				}
				return;
			}
			else
				window.eval(itm.innerHTML);
			
			nav.set_button();
        };
    }
    try
    {
		if(content != "parent")
		{
			breadcrumbs.push(content);
			breadcrumbs_current = breadcrumbs_current+1;
		}
		
        xmlhttp.open("GET", "../getter.php?cnt=" + content, true);
        xmlhttp.send();
    }
    catch(e)
    {
        console.log("AJAX ERROR: " + e);
    }
    
}
