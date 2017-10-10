<div id="home_">
    <center>
        <br>
        <div id="logo" class="float-none">
            <img src="{{BASE_URL}}/assets/images/logo/prana_logo.png">
        </div>
        <br>
        <br>
        <div id="home_src">
            <div id="src_txt">
                <script type="text/javascript">
                    '+dl_r(17)+'
                </script>
            </div>
            <br>
            <br>
            <form>
                <input type="text" value="'+dl_r(18)+'" name="src_bx" id="src_bx" style="width: 300px; height: 33px;" onclick="javscript:val=document.getElementById('src_bx').value;if(val==''+dl_r(18)+''){remove_value('src_bx');}" onblur="val=document.getElementById('src_bx').value;if(val==''){document.getElementById('src_bx').value='+dl_r(18)+';}">
                    <select id="src_in" value="In"></select>
                <input type="button" value=">" name="src_bx" style="width: 35px; height: 33px; background-color: rgba(9, 103, 126, 1.0);" onclick="javascipt:val=document.getElementById('src_bx').value; redirect('search');">
            </form>
        </div>
        <br>
        <div id="home_buttons">
            <div id="button1">
                <a href="javascript:redirect('content', 'food', '+get_local("area")+');">
                    <img src="{{BASE_URL}}/assets/images/icons/icon_food.png" width="50px" height="50px">
                    <br>'+dl_r(19)+'
                </a>
            </div>
            <div id="button2">
                <a href="javascript:redirect('content','housing','+get_local("area")+');">
                    <img src="{{BASE_URL}}/assets/images/icons/icon_housing.png" width="50px" height="50px">
                    <br>'+dl_r(20)+'
                </a>
            </div>
            <div id="button3">
                <a href="javascript:redirect('content','medical', '+get_local("area")+');">
                    <img src="{{BASE_URL}}/assets/images/icons/Icon_health.png" width="50px" height="50px">
                    <br>'+dl_r(21)+'
                </a>
            </div>
            <div id="button4">
                <a href="javascript:redirect('content','legal', '+get_local("area")+');">
                    <img src="{{BASE_URL}}/assets/images/icons/icon_legal and advice.png" width="50px" height="50px">
                    <br>'+dl_r(22)+'
                </a>
            </div>
            <div id="button5">
                <a href="javascript:redirect('content','study', '+get_local("area")+');">
                    <img src="{{BASE_URL}}/assets/images/icons/icon_study2.png" width="50px" height="50px">
                    <br>'+dl_r(23)+'
                </a>
            </div>
            <div id="button6">
                <a href="javascript:redirect('content','jobs', '+get_local("area")+');">
                    <img src="{{BASE_URL}}/assets/images/icons/icon_jobs.png" width="50px" height="50px">
                    <br>'+dl_r(24)+'
                </a>
            </div>
            <div id="button7">
                <a href="javascript:redirect('content_modular','', '+get_local("area")+');">
                    <img src="{{BASE_URL}}/assets/images/icons/icon_.png" width="50px" height="50px">
                    <br>'+dl_r(108)+'
                </a>
            </div>
        </div>
    </center>
</div>
</br>
</br>
<script>fill_search_type("src_in");</script>
