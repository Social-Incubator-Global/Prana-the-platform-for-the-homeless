<?php
function content_find($content)
{
    if($content == "parent")
    {
        $result = sql_get_all("content_categories");
        set_content_nav($result);
        set_content($content, $result);
    }
    else if($content == "back")
    {

    }
    else
    {
        $row = return_first_row(sql_get("content_elements", "class='".$content."'"));
        set_content($content, $row);
    }
    echo("bread_crumbs('".$content."');");
    return;
}

function set_content_nav($result)
{
    while($row = $result->fetch_assoc())
    {
        echo("add_sideban_button('".$row["title"]."', '".$row["image"]."', '".$row["id"]."');");
    }
    return;
}

function set_content($content, $result)
{
    if($content == "parent")
    {
        echo("render_content('Welcome to prana', '<label>Prana is an interactive guide for those at risk of being homeless or those who have been pushed off the cliff in and around Berlin. Useful tips on how to stay clean, where and when to find food and how to survive, including many different free offers at establishments, advice on how to get around and advice with beurocratic hurdles. Our main focus is on the long term. Getting you back on your feet. <label class=\"label_highlighted\">If you are in desperate need to find somewhere for tonight</label></label><br><br><input class=\"button_gen\" type=\"button\" value=\"Click here\"/><br><br><hr><br><label class=\"title\">Emergencies</label><br><label>Need <label class=\"label_highlighted\">EMERGENCY assistance?</label> you my contact these emergency services:</label><br><br>> <a href=\"javascript: AJAX(\'emergency_medi_healthinsure\');\">Medical attention with health insurance</a><br>> <a href=\"\">Medical attention without health insurance</a><br>> <a href=\"\">Police</a><br>> <a href=\"\">Police for the homeless</a>', 'image');");
    }
    else
    {
        echo("render_content('".$result["title"]."', '".$result["paragraph"]."', 'img');");
    }
    return;
}
?>