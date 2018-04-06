<?php
$studentId = intval($_POST['studentIdToSearch']);

include("../../db/config.php");
//$studentId = $_POST['studentIdToSearch'];

$queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone
                      FROM Student_To_Contacts 
                      JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id 
                      WHERE Student_Id = $studentId;";

$contactsForStudent = mysqli_query($db, $queryForContacts);
?>
<link rel="stylesheet" href="../../css/show-contact-modal.css"/>
<div class="container">
    <!-- Modal -->
    <div class="modal right fade" id="showContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-3">

                    </div>
                    <div class="col-6">
                        <h4 class="modal-title text-center" id="myModalLabel2">Contact Info</h4>
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

                    while ($contactRow = mysqli_fetch_array($contactsForStudent, MYSQLI_ASSOC)) {
                        $contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];
                        $contactPhone = $contactRow['Primary_Phone'];
                    echo "

                    <i class='glyphicon glyphicon-user'></i>
                    <span>Name: $contactName</span>
                    <i class='glyphicon glyphicon-earphone'></i><span>Primary Phone: $contactPhone</span>
                    <span>Email: </span>

                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                        nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                        beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                        lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                        probably haven't heard of them accusamus labore sustainable VHS.
                    </p>
                    ";

                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
