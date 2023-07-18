<style type="text/css">
    #sidebar-menu ul li a {
    display: block;
    padding: 0.75rem 1.5rem;
    color: #bcbdcb;
    position: relative;
    font-size: 14px;
    -webkit-transition: all .4s;
    transition: all .4s;
}
</style>
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <div style="padding: 4px;"> 
        <select class="form-control" id="topic" onchange="get_data()">
            <option value="">Choose Topic</option>
            <?php 
                foreach ($topics as $key) {
                ?>
                <option value="<?php echo $key['TopicId']; ?>"><?php echo $key['Name']; ?></option>
            <?php } ?>
        </select>
        <br>

        <!-- <select class="form-control" id="vendor" onchange="get_data()">
            <option value="">Choose Vendors</option>
            <?php 
                foreach ($vendors as $key) {
                ?>
                <option value="<?php echo $key['VId']; ?>"><?php echo $key['VName']; ?></option>
            <?php } ?>
        </select> -->

    </div>
    
    <ul class="metismenu list-unstyled" id="side-menu">

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email-variant"></i>
                <span>Levels</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php 
                foreach ($levels as $key) {
                ?>
                <li style="padding-left: 58px;">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" onchange="get_data()" value="<?php echo $key['level_id']; ?>" name="levels" >
                      <label class="form-check-label" for="defaultCheck1">
                        <?php echo $key['level_name']; ?>
                      </label>
                    </div>
                   
                </li>
                <?php } ?>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email-variant"></i>
                <span>Languages</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php 
                foreach ($language as $key) {
                ?>
                <li style="padding-left: 58px;">

                    <div class="form-check">
                      <input class="form-check-input lang" type="checkbox" onchange="get_data()" value="<?php echo $key['lang_id']; ?>" name="langs" >
                      <label class="form-check-label" for="defaultCheck1">
                        <?php echo $key['lang_name']; ?>
                      </label>
                    </div>
                   
                </li>
                <?php } ?>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email-variant"></i>
                <span>Mode of delivery</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php 
                foreach ($type as $key) {
                ?>
                <li style="padding-left: 58px;">

                    <div class="form-check">
                      <input class="form-check-input type" onchange="get_data()" type="checkbox" value="<?php echo $key['tt_id']; ?>" name="types" >
                      <label class="form-check-label" >
                        <?php echo $key['tt_name']; ?>
                      </label>
                    </div>
                   
                </li>
                <?php } ?>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email-variant"></i>
                <span>Vendors</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php 
                foreach ($vendors as $key) {
                ?>
                <li style="padding-left: 58px;">

                    <div class="form-check">
                      <input class="form-check-input vendor" onchange="get_data()" type="checkbox" value="<?php echo $key['Comp_cd']; ?>" name="vendor" >
                      <label class="form-check-label" >
                        <?php echo $key['Name']; ?>
                      </label>
                    </div>
                   
                </li>
                <?php } ?>
            </ul>
        </li>

        <li class="menu-title">Duration</li>
        <li>
            <div style="padding: 4px;">
                <input type="range" class="form-control-range" id="myRange" min="2" max="50" value="8" onchange="get_data()">
                <p>Value: <span id="demo"></span></p>
            </div>
        </li>
        
        <br>
        <br>
        <br>
        <li>
            <a href="<?php echo base_url('dashboard'); ?>" class="waves-effect">
                <i class="mdi mdi-speedometer"></i>
                <span>Dashboard</span>
            </a>
        </li>
    </ul>
</div>

<script type="text/javascript">
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }

</script>

