


<div class="col-md-10 content " id="view_schedule_admin">
    <script type="text/javascript">
    let data_text = '<?php echo $_SESSION['user']['student_text']; ?>';
    if(data_text === ''){
        opentabs('login_schedule_admin');
    }
</script>
    <div class="example" style="margin-top: -1%">
            <div class="container">
<div class="container col-sm-4 col-md-7 col-lg-5 mt-5">
    <div class="block">
        <div class="card">       
        <h3 class="card-header" id="monthAndYear"></h3>       
        <table class="table table-bordered table-responsive-sm" id="calendar" >
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        <div class="form-inline">

            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
        </div>
        <br/>
        <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
            </select>


            <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
            
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
        </select></form>
    </div>
   <!--  <div>
        <button class="btn btn-outline-primary logout" onclick="logout();">Logout</button>
    </div> -->
    <div id="_demo_view_schedule_admin"></div>
    </div>
    
    
</div>
</div>  
</div>
</div>
<!--<button name="jump" onclick="jump()">Go</button>-->
<script src="../kit_club/calender/js/script_tkb_kit.js"></script>

<!-- Optional JavaScript for bootstrap -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

