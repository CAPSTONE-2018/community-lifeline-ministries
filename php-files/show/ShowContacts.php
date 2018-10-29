<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");

$queryForActiveContacts = "SELECT * FROM Contacts WHERE Active_Contact = 1 ORDER BY Last_Name;";
$activeContactsResults = mysqli_query($db, $queryForActiveContacts);
?>

<div class="app-title">
    <div>
        <h3><i class="fa fa fa-bookmark-o"></i> Contacts</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> All Contacts</li>
    </ul>
</div>


<div class="card">
    <div class="card-header">
        <div class="col-12 text-center">
            <h2><i class="fa fa-address-card-o"></i> All Contacts</h2>
        </div>
    </div>

    <div class="container">
        <table id="showContactsTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th class="text-center align-middle">#</th>
                <th class="align-middle">Name</th>
                <th class="text-center align-middle">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>

            <tbody>
            <?php
            while ($activeContactsRow = mysqli_fetch_assoc($activeContactsResults)) {
                $contactId = $activeContactsRow['Id'];
                $nameToDisplay = $activeContactsRow['First_Name'] . ' ' . $activeContactsRow['Last_Name'];;
                $contactEmail = $activeContactsRow['Email'];
                $contactPhoneNumber = $activeContactsRow['Primary_Phone'];
                ?>
                <tr>
                    <td class="text-center align-middle"></td>
                    <td class="align-middle">
                        <?php echo $nameToDisplay; ?>
                        <input type='hidden' value='<?php echo $contactId; ?>'/>
                    </td>
                    <td class='text-center align-middle'><?php echo $contactEmail; ?></td>
                    <td class='text-center align-middle'><?php echo $contactPhoneNumber; ?></td>
                    <td class='text-center align-middle'>
                        <div class='left-action-buttons-container d-inline m-auto'>
                            <div class='d-inline'>
                                <button type='button' data-toggle='modal' data-target='#customModal'
                                        data-dismiss='modal'
                                        class='btn show-contacts-action-buttons edit-button'
                                        onclick='launchEditContactModal(<?php echo $contactId; ?>)'
                                >
                                    <i class='fa fa-pencil'></i> Edit
                                </button>
                            </div>
                            <div class='d-inline'>
                                <button type='button' data-toggle='modal' data-target='#customModal'
                                        data-dismiss='modal'
                                        class='btn show-contacts-action-buttons delete-button'
                                        onclick='launchConfirmArchiveModal(
                                                "<?php echo $contactId; ?>",
                                                "ArchiveContact.php",
                                                "Contact",
                                                "<?php echo $nameToDisplay; ?>",
                                                "ShowContacts.php")'
                                >
                                    <i class='fa fa-archive'></i> Archive
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#showContactsTable').DataTable({
                dom: '<lf<t>iBp>',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        } );
    </script>
</div>

<?php
include("../app-shell/Footer.php");
?>
