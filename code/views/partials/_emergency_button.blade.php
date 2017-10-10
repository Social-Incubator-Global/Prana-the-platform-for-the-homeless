<div class="mr-auto" id='emergency_button_div'>
    <formx>
        <input id='emergency_call' src='{{BASE_URL}}/assets/images/prn_ico/call.png' style='background-color: red;' type='image' onclick='javascript:show_drop_down();'>
        <input class='emergency_button' id='emergency_button' type='button' style='background-color:red; height:30px;' onclick='javascript:show_drop_down();' value='Emergency'></input>
    </form>
</div>
<div>
    <div id="myDropdown" style='color:black; font-family:Arial; font-size:14px;' class="dropdown-content">
        <div style='background-color:rgb(9, 103, 126);'>
            <center>
                <br>
                <img src='{{BASE_URL}}/assets/images/icons/icon_health1.png' height='100px' width='100px'/>
                <br>
                <br>
            </center>
        </div>
        <div style='background-color:red; color:white;'>
            <br>
            <div style='margin-left:12px; margin-right:12px;'>
                <p>At the moment we do not provide direct calls to any of the listed emergency services, below is a list of numbers you may call using a public or private phone:</p>
            </div>
            <br>
        </div>
        <br>
        <a id="artzmob_cari_drop_content" href="#">
            Artzmobil Caritas:<br>Tel: -/-<br>Address: -/-<input style='float: right; height:19px;' type='image' src='{{DOC_ROOT}}/assets/images/prn_ico/led_icons/marker.png'></input><input style='float: right; height: 30px;' type='button' value='View in map'></input>
        </a>
        <a id="pol_drop_content" href="#">Polizei für die obdachlosen:<br>Tel: -/-<br>Address: -/-
            <input style='float: right; height:19px;' type='image'
            src='{{DOC_ROOT}}/assets/images/prn_ico/led_icons/marker.png'>
            </input>
            <input style='float: right;' type='button' value='View in map'></input>
        </a>
    </div>
</div>
