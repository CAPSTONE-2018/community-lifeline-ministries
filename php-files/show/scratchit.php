<h1>Displaying All Programs:</h1>
<div class="col-lg">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input id="searchInput" class="mdl-textfield__input" name="searchInput" onkeyup="return FilterFields();" type="text"/>
        <label class="mdl-textfield__label" for="searchInput">Search Programs</label>
    </div>
</div>
<br />

<div id="print_div">
    <table id="searchTable" class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Program Name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['Id']; //coming from Schedule table
            echo "</td><td>";
            echo $row['Program_Name']; //coming from Class table
            echo "</td><td>";
        }
        ?>
        </tbody>
    </table>
</div>
<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
