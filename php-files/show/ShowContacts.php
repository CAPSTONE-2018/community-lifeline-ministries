<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../../db/config.php");

$queryForActiveContacts = "SELECT * FROM Contacts ORDER BY Last_Name;";
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
                <th class="text-center align-middle">Active</th>
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
                    <td class="text-center align-middle"><?php echo $activeContactsRow['Active_Contact'] ?></td>
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
                                        class='btn large-action-buttons edit-button'
                                        onclick='launchEditContactModal(<?php echo $contactId; ?>)'
                                >
                                    <i class='fa fa-pencil'></i> Edit
                                </button>
                            </div>
                            <div class='d-inline'>
                                <button type='button' data-toggle='modal' data-target='#customModal'
                                        data-dismiss='modal'
                                        class='btn large-action-buttons delete-button'
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

                        <div class='right-action-buttons-container d-inline'>
                                    <span title='Volunteers' data-toggle='tooltip' class='small-action-buttons'>
                                        <button type='button' onclick=''
                                                class='btn small-action-buttons test-scores-button'
                                        >
                                            <i class='fa fa-star mr-0'></i>
                                        </button>
                                    </span>
                            <span title='Students For Contact' data-toggle='tooltip'
                                  class='small-action-buttons'>
                                        <button type='button'
                                                onclick='launchStudentsToContactModal(<?php echo $contactId; ?>)'
                                                class='btn small-action-buttons contact-button'
                                        >
                                            <i class='fa fa-graduation-cap mr-0'></i>
                                        </button>
                                    </span>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th class="text-center align-middle"></th>
                <th class="align-middle">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Actions</th>
            </tr>
            </tfoot>
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
            var table = $('#showContactsTable').DataTable();

            table.columns().flatten().each( function ( colIdx ) {
                // Create the select list and search operation
                var select = $('<select />')
                    .appendTo(
                        table.column(colIdx).footer()
                    )
                    .on( 'change', function () {
                        table
                            .column( colIdx )
                            .search( $(this).val() )
                            .draw();
                    } );

                // Get the search data for the first column and add to the select list
                table
                    .column( colIdx )
                    .cache( 'search' )
                    .sort()
                    .unique()
                    .each( function ( d ) {
                        select.append( $('<option value="'+d+'">'+d+'</option>') );
                    } );
            } );
        } );
    </script>
</div>

<?php
include("../app-shell/Footer.php");
?>
