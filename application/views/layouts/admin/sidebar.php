<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="<?php echo base_url('dashboard'); ?>" class="waves-effect">
                <i class="mdi mdi-speedometer"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- partner 1 -->
        <?php 
        if(in_array(authuser()->role, array(1, 9))){
        ?>
        <li>
            <a href="<?php echo base_url('company'); ?>" class="waves-effect">
                <i class="mdi mdi-speedometer"></i>
                <span>Company Details</span>
            </a>
        </li>
    <?php } ?>

    <!-- customer 0 -->
        <?php 
        if(in_array(authuser()->role, array(0,1,2,3,4, 9))){
        ?>
        <!-- <li>
            <a href="<?php echo base_url('training'); ?>" class="waves-effect">
                <i class="mdi mdi-speedometer"></i>
                <span>Traning Details</span>
            </a>
        </li> -->

        <li>
            <a href="<?php echo base_url('Course'); ?>" class="waves-effect">
                <i class="mdi mdi-speedometer"></i>
                <span>Available Course</span>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url('Course/custom'); ?>" class="waves-effect">
                <i class="mdi mdi-speedometer"></i>
                <span>Custom Course</span>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url('Questions'); ?>" class="waves-effect">
                <i class="mdi mdi-speedometer"></i>
                <span>Questions</span>
            </a>
        </li>

        <?php } ?>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-email-variant"></i>
                <span>Graph</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?php echo base_url('Analytics/ceo_hr_map'); ?>">CEO-HR Domain Heatmap</a></li>
                <li><a href="<?php echo base_url('Analytics/gap_analysis'); ?>">Domain Gap Analysis</a></li>
                <!-- <li><a href="<?php echo base_url('Analytics/subdomain_map'); ?>">SubDomain Heat Map</a></li> -->
                <li><a href="<?php echo base_url('Analytics/key_expectation'); ?>">HR SubDomain Expectation</a></li>
                <li><a href="<?php echo base_url('Analytics/key_concerns'); ?>">EMP SubDomain Expectation</a></li>
                <li><a href="<?php echo base_url('Analytics/hr_emp_analytics'); ?>">SubDomain Gap Analytics</a></li>
            </ul>
        </li>

    </ul>
</div>