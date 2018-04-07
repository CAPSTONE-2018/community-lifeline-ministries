<?php
include("../../db/config.php");
$studentId = $_POST['studentIdToSearch'];
$queryForContacts = "SELECT * FROM Contacts
            JOIN Student_To_Contacts ON Contacts.Id = Student_To_Contacts.Contact_Id 
            WHERE Student_To_Contacts.Student_Id = '$studentId';";
$studentContactResults = mysqli_query($db, $queryForContacts);
$dynamicRowId = 0;
error_log($queryForContacts);
?>
<link rel="stylesheet" href="../../css/modals/contact-modal.css"/>
<div class="container">
    <!-- Modal -->
    <div class="modal right fade" id="showContactModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-3">

                    </div>
                    <div class="col-6">
                        <h4 class="modal-title text-center" id="myModalLabel2"><i class="fa fa-address-card-o"></i>
                            Contact Info</h4>
                    </div>
                    <div class="col-3 align-middle">
                        <div class="align-middle">
                            <button type="button" class="close modal-title" data-dismiss="modal" aria-label="Close">
                                <span class="align-middle " aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <?php
                    while ($contactRow = mysqli_fetch_assoc($studentContactResults)) {
                        $dynamicRowId++;

                        $contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];
                        $contactPhone = $contactRow['Primary_Phone'];
                        $contactEmail = $contactRow['Email'];
                        $contactAddressOne = $contactRow['Address_One'];
                        $contactAddressTwo = $contactRow['Address_Two'];
                        $contactCity = $contactRow['City'];
                        $contactState = $contactRow['State'];
                        $contactZip = $contactRow['Zip'];

                        error_log($contactName);
                        error_log($contactCity);
                        error_log($contactZip);
                        ?>
                        <div class="row form-group">
                            <div class="col-2 text-center mt-auto mb-auto">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-10">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactName" class="mdl-textfield__input" readonly
                                           value="<?php echo $contactName; ?>"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="contactName">Contact Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-2 text-center mt-auto mb-auto">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="col-10">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="primaryPhone" class="mdl-textfield__input" readonly
                                           value="<?php echo $contactPhone; ?>"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="primaryPhone">Primary Phone</label>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-2 text-center mt-auto mb-auto">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="col-10">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactEmail" class="mdl-textfield__input" readonly="readonly"
                                           value="<?php echo $contactEmail; ?>"
                                           type="email"/>
                                    <label class="mdl-textfield__label" for="contactEmail">Contact Email</label>
                                </div>
                            </div>
                        </div>

                        <p>
                            <button class="btn btn-outline" type="button" data-toggle="collapse"
                                    data-target="#collapseAddress<?php echo $dynamicRowId; ?>" aria-expanded="false"
                                    aria-controls="collapseAddress<?php echo $dynamicRowId; ?>">
                                View Address Info
                            </button>
                        </p>

                        <div class="collapse" id="collapseAddress<?php echo $dynamicRowId; ?>">
                            <div class="row form-group">
                                <div class="col-2 text-center mt-auto mb-auto">
                                    <i class="fa fa-address-book-o"></i>
                                </div>
                                <div class="col-10">

                                    <div class="">
                                        <?php echo $contactAddressOne . " " . $contactAddressTwo; ?>
                                    </div>
                                    <div class="">
                                        <?php echo $contactCity . ", " . $contactState; ?>
                                    </div>
                                    <div class="">
                                        <?php echo $contactZip; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>