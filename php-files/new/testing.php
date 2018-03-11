<?php
include("../scripts/header.php");
?>

<link rel="stylesheet" href="../../css/check-mark-styles.css"/>

    <script type="text/javascript" src="jquery.js"></script>

    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Object Store</h3></div>
            <div class="panel-body">
<!--                <table class="table table-condensed table-hover" style="border-collapse:collapse;">-->
<!---->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>#</th>-->
<!--                        <th class="left-column-title">Student Name</th>-->
<!--                        <th class="centered-column-title">Present</th>-->
<!--                        <th class="centered-column-title">Absent</th>-->
<!--                        <th class="centered-column-title">Tardy</th>-->
<!--                        <th class="centered-column-title">Actions</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!---->
<!--                    <tbody>-->
<!--                        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">-->
<!--                            <td>-->
<!--                                <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button>-->
<!--                            </td>-->
<!--                            <td>OBS Name</td>-->
<!--                            <td>OBS Description</td>-->
<!--                            <td>hpcloud</td>-->
<!--                            <td>nova</td>-->
<!--                            <td> created</td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td colspan="12" class="hiddenRow">-->
<!--                                <div class="accordian-body collapse" id="demo1">-->
<!--                                <table class="table table-striped">-->
<!--                                    <thead>-->
<!--                                    <tr>-->
<!--                                        <td><a href="WorkloadURL">Workload link</a></td>-->
<!--                                        <td>Bandwidth: Dandwidth Details</td>-->
<!--                                        <td>OBS Endpoint: end point</td>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!---->
<!--                                    </tbody>-->
<!--                                </table>-->
<!---->
<!--                            </div>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->



                <table border=1 id="table_detail" class="table table-condensed table-hover table-responsive" align=center cellpadding=10>

                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Job</th>
                    </tr>

                    <tr onclick="show_hide_row('hidden_row1');"><td>Ankit</td><td>25</td><td>60000</td><td>Computer Programmer</td></tr>
                    <tr id="hidden_row1" class="hidden_row">
                        <td colspan=4>Ankit is 25 years old and he is a computer programmer he earns 60000 per month</td>
                    </tr>

                    <tr onclick="show_hide_row('hidden_row2');"><td>Aarti</td><td>29</td><td>40000</td><td>Web Designer</td></tr>
                    <tr id="hidden_row2" class="hidden_row">
                        <td colspan=4>Aarti is 29 years old and she is a web designer he earns 40000 per month</td>
                    </tr>

                    <tr onclick="show_hide_row('hidden_row3');"><td>Mohit</td><td>32</td><td>90000</td><td>Cyber Security Expert</td></tr>
                    <tr id="hidden_row3" class="hidden_row">
                        <td colspan=4>Mohit is 32 years old and he is a cyber security expert he earns 90000 per month</td>
                    </tr>

                    <tr onclick="show_hide_row('hidden_row4');"><td>John</td><td>22</td><td>20000</td><td>Content Writer</td></tr>
                    <tr id="hidden_row4" class="hidden_row">
                        <td colspan=4>John is 22 years old and he is a content writer he earns 20000 per month</td>
                    </tr>

                    <tr onclick="show_hide_row('hidden_row5');"><td>Mukesh</td><td>40</td><td>3,50000</td><td>Chief Executive</td></tr>
                    <tr id="hidden_row5" class="hidden_row">
                        <td colspan=4>Mukesh is 40 years old and he is chief executive he earns 3,50000 per month</td>
                    </tr>

                </table>
            </div>

        </div>

    </div>

<?php
include("../scripts/footer.php");
?>


