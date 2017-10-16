<?php include_once('src/help_function.php');?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Togglesdfgsdfg navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Panel</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <br/>
						<li>
                            <a href="?page=view/main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i><?php echo case_title("employe_info");?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/current_employ.php"><?php echo case_title("current_employes");?></a>
                                </li>
                                <li>
                                    <a href="?page=view/deactive_employ.php"><?php echo case_title("deactive_employes");?></a>
                                </li>
                            </ul>
                            
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i><?php echo case_title("designation_info");?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/designation.php"><?php echo case_title("designation_details");?></a>
                                </li>   
                            </ul>   
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-pie-chart fa-fw"></i><?php echo case_title("paygrade_info");?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/current_paygrade.php"><?php echo case_title("current_paygrades");?></a>
                                </li>
                                <li>
                                    <a href="?page=view/deactive_pay_list.php"><?php echo case_title("deactive_paygrades");?></a>
                                </li>
                                <li>
                                    <a href="?page=view/manage_payitem.php"><?php echo case_title("manage_payitems");?></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>