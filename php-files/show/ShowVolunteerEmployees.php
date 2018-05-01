<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../../db/config.php");
$queryForActiveVolunteers = "SELECT * FROM Volunteer_Employees WHERE Active_Volunteer = 1;";
$activeVolunteerResults = mysqli_query($db, $queryForActiveVolunteers);
?>
<div class="app-title">
    <div>
        <h3><i class="fa fa-bookmark-o"></i> Volunteers</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> All Volunteers</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="col-12 text-center">
                <h3><i class="fa fa-star"></i> All Volunteers</h3>
            </div>

            <div class="row">
                <div class="search-input-wrapper col-6">
                    <input id="search-input" type="text" placeholder="Search" onkeyup="FilterFields()">
                    <i class="align-middle fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                </div>

                <div class="align-middle m-auto text-right col-6">
                    <div class="btn-group btn-toggle">
                        <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible2">
                            Active
                        </button>

                        <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible2">
                            In-Active
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <form class="container-fluid" method="POST" action="#" name="allContactsTable" id="allContactsTable">
            <div class="table-responsive col-sm-12">
                <table id="search-table" class="table table-striped table-condensed table-hover">
                    <thead>
                    <tr class="row">
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-3">Name</th>
                        <th class="col-sm-2 text-center">Email</th>
                        <th class="col-sm-2 text-center">Phone</th>
                        <th class="col-sm-4 text-center">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    while ($activeVolunteersRow = mysqli_fetch_assoc($activeVolunteerResults)) {
                        $volunteerId = $activeVolunteersRow['Id'];
                        $nameToDisplay = $activeVolunteersRow['First_Name'] . ' ' . $activeVolunteersRow['Last_Name'];
                        $volunteerEmail = $activeVolunteersRow['Email'];
                        $volunteerPhoneNumber = $activeVolunteersRow['Primary_Phone'];
                        ?>
                        <tr class='row'>
                            <td class='col-sm-1 align-middle'></td>
                            <td class='col-sm-3 align-middle'>
                                <?php echo $nameToDisplay; ?>
                                <input type='hidden' value='<?php echo $volunteerId; ?>'/>
                            </td>
                            <td class='col-sm-2 align-middle text-center'><?php echo $volunteerEmail; ?></td>
                            <td class='col-sm-2 align-middle text-center'><?php echo $volunteerPhoneNumber; ?></td>
                            <td class='col-sm-4 text-center'>
                                <div class='left-action-buttons-container d-inline m-auto'>
                                    <div class=' d-inline'>
                                        <button type='button'
                                                class='btn large-action-buttons edit-button'
                                                onclick=''
                                        >
                                            <i class='fa fa-pencil'></i> Edit
                                        </button>
                                    </div>
                                    <div class='d-inline'>
                                        <button type='button'
                                                class='btn large-action-buttons delete-button'
                                                onclick='launchArchiveEmployeeModal(
                                                        "<?php echo $volunteerId; ?>",
                                                        "<?php echo $nameToDisplay; ?>"
                                                        )'
                                        >
                                            <i class='fa fa-archive'></i> Archive
                                        </button>
                                    </div>
                                </div>

                                <div class='right-action-buttons-container d-inline'>
                                            <span title='Availability' data-toggle='tooltip'
                                                  class='small-action-buttons'>
                                                <button type='button' onclick=''
                                                        class='btn small-action-buttons test-scores-button'>
                                                    <i class='fa fa-star'></i>
                                                </button>
                                            </span>
                                    <span title='Programs' data-toggle='tooltip'
                                          class='small-action-buttons'>
                                                <button type='button' onclick=''
                                                        class='btn small-action-buttons contact-button'>
                                                    <i class='fa fa-pencil'></i>
                                                </button>
                                            </span>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>

        <div class="card-footer">
            <input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')"
                   value="Print"/>
        </div>

    </div>
</div>
<?php
include("../app-shell/Footer.php");
