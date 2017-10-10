<center>
    <div id="sel_home_type">
        <input onclick="
        javscript:
            val=document.getElementById('src_bx').value;
            if(val=='Search Prana') {
                console.log(''+dl_r(18)+'');
                remove_value('src_bx');
            }"
        class="home_type_button_text float-left ml-0"
        id="src_bx" style="width:50%; height:70%; border-radius:0px; border: 1px solid rgb(255, 127, 36);"
        type="text">
        </input>
            <select id="src_in_top"></select>
            </select>
            <input type="button" value=">"
            onclick="javascipt:
                val=document.getElementById('src_bx').value;
                redirect('search');"
                name="src_bx_top" id="src_bx_top">
    </div>
</center>
<script>get_item("src_bx").value=dl_r(18); fill_search_type("src_in_top");</script>
