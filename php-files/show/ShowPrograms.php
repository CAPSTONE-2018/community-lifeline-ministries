<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");
$queryForPrograms = "SELECT * FROM Programs;";

$programResults = mysqli_query($db, $queryForPrograms);
?>
    <div class="print_div">
        <div class="card">
            <div class="card-header">
                <div class="col-12 text-center">
                    <h3><i class="fa fa-pencil"></i>  All Programs</h3>
                </div>

                <div class="row">
                    <div class="search-input-wrapper col-6">
                        <input id="search-input" type="text" placeholder="Search" onkeyup="FilterFields()">
                        <i class="align-middle fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                    </div>

                    <div class="align-middle m-auto text-right col-6">
                        <div class="btn-group btn-toggle">
                            <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible2">
                                Show All
                            </button>

                            <span title='G.E.M.' data-toggle='tooltip'>
                                <button class="btn btn-default">
                                    <i class="fa fa-diamond"></i>
                                </button>
                            </span>

                            <span title='Sons of Thunder' data-toggle='tooltip'>
                                <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible">
                                    <i class="fa fa-bolt"></i>
                                </button>
                            </span>

                            <span title='Blessing Table' data-toggle='tooltip'>
                                <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible">
                                    <i class="fa fa-book"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-content">
                    <form method="POST" action="#" name="allProgramsTable"
                          id="allProgramsTable">
                        <div class="table-responsive">
                            <table id="search-table" class="table table-striped table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-5">Program</th>
                                    <th class="col-sm-6 text-center">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                while ($programsRow = mysqli_fetch_assoc($programResults)) {
                                    $programName = $programsRow['Program_Name'];
                                    $programId = $programsRow['Id'];
                                    $tableToLookUp = "Programs";
                                    ?>
                                    <tr class='number-row'>
                                        <td class='col-sm-1 align-middle'></td>
                                        <td class='col-sm-5 align-middle'><?php echo $programName; ?></td>
                                        <td class='hidden align-middle'>
                                            <input type='hidden' value=<?php echo $programId; ?>/>
                                        </td>

                                        <td class='col-sm-6 text-center'>
                                            <div class='left-action-buttons-container d-inline m-auto'>
                                                <div class=' d-inline'>
                                                    <button type='button'
                                                            class='btn large-action-buttons edit-button'
                                                            onclick='launchEditProgramModal(<?php echo $programId; ?>)'
                                                    >
                                                        <i class='fa fa-pencil'></i> Edit
                                                    </button>
                                                </div>
                                            </div>

                                            <div class='right-action-buttons-container d-inline'>
                                                <span title='Volunteers' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button'
                                                            onclick='launchVolunteersInProgramModal(<?php echo $programId; ?>)'
                                                            class='btn small-action-buttons test-scores-button'
                                                    >
                                                        <i class='fa fa-star'></i>
                                                    </button>
                                                </span>
                                                <span title='Students In Program' data-toggle='tooltip'
                                                      class='small-action-buttons'>
                                                    <button type='button'
                                                            onclick='launchStudentsInProgramModal(<?php echo $programId; ?>)'
                                                            class='btn small-action-buttons contact-button'
                                                    >
                                                        <i class='fa fa-graduation-cap'></i>
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
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

<?php
include("../scripts/footer.php");
?>
