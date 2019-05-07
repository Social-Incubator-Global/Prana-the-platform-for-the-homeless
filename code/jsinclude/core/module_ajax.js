function AJAX(content)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState === 4 && this.status === 200)
        {
            //itm created exclusively so that response InnerHTML .js can be executed
            var itm; var cont = false;
            var js_type; //0=execute innerHTML, 1=execute returned expression AKA "var resp" directly through "eval()".
            //EXECUTE JS using eval(). Eval should be replaced later on with something better. "Eval is evil!!!"
            itm=this.responseText;
            if(js_type)
            {
                var x = itm.length;
                for(var i=0;i<x.length;i++)
                {
                    eval(x[i].text);
                }
            }
            else
            {
                try
                {
                    eval(this.responseText);
                }
                catch(exp)
                { }
            }
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