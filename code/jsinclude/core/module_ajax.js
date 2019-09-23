function AJAX(content)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState === 4 && this.status === 200)
        {
            //itm created exclusively so that response InnerHTML .js can be executed
            var itm = get_item("lang_div");
            var js_type = true;
            itm.innerHTML=this.responseText;
            
            alert(itm.innerHTML);
			if(js_type)
			{
				var x = itm.getElementsByTagName("script");
				alert(x);
				for(var i=0; i < x.length; i++)
				{
					window.eval(x[i].text);
				}
				return;
			}
			else
				window.eval(itm.innerHTML);
        };
    }
    try
    {
        console.log("../getter.php?cnt=" + content);
        xmlhttp.open("GET", "../getter.php?cnt=" + content, true);
        xmlhttp.send();
    }
    catch(e)
    {
        console.log("AJAX ERROR: " + e);
    }
    
}
