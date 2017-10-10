<div {{-- id="lang_selector" --}}>
    <form>
        <select {{-- id="lang_select" --}} onChange="javascript:var ndx=document.getElementById('lang_select').selectedIndex; apply_language(ndx); if(location_!='posting'){redirect(location_, home_type, area);}else{redirect(location_, ID, area);}"></select>
            <script>
                var index = 0;
                for (index = 0; index < def_langs.length; ++index)
                {
                    var select = document.getElementById("lang_select");
                    select.options[select.options.length] = new Option(def_langs[index], def_langs[index]);
                }
                change_lang();
            </script>
        </select>
    </form>
</div>
