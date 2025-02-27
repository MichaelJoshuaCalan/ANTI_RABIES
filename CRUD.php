<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

</style>
<body>
    <!-- READ/SELECT -->
    <div class="read_query">
        <div class="query_read">
            <?php
            include "db_conn.php";
            
            $read_query = "SELECT * FROM sample_table";
            $read_result = mysqli_query($conn,$read_query);

            if(!$read_result){
                die("Failed: ".mysqli_error($conn));
            }
            ?>
        </div>
        <div class="read_html">
            <table>
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>AGE</th>
                        <th>SEX</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($read_row = mysqli_fetch_assoc($read_result)):?>
                    <tr>
                        <td><?php echo $read_row['name'];?></td>
                        <td><?php echo $read_row['age'];?></td>
                        <td><?php echo $read_row['sex'];?></td>
                        <td><a href="#update">EDIT</a></td>
                    </tr>
                <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
    <!--END OF READ/SELECT -->

    <!-- ADD/CREATE QUERY -->
    <div class="create_query">
        <div class="query_create">
            <?php 
            include "db_conn.php";
                if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['create'])){
                    $name = mysqli_real_escape_string($conn,$_POST['name']);
                    $age = (int) mysqli_real_escape_string($conn,$_POST['age']);
                    $sex = mysqli_real_escape_string($conn,$_POST['sex']);

                    $create_query = "INSERT INTO sample_table(name,age,sex)
                                        VALUES('$name','$age','$sex')";
                    if($conn->query($create_query)===TRUE){
                        header("Location: " .$_SERVER['PHP_SELF']);
                        exit();
                    }
                    else{
                        echo "FAIL:".$create_query . $conn->error;
                    }
                    
                }
            ?>
        </div>
        <div class="create_form">
            <form action="" method="POST">
                <label for="">NAME:</label>
                <input type="text" name="name" id="">

                <label for="">AGE</label>
                <input type="number" name="age" id="">

                <label for="">SEX</label>
                <input type="text" name="sex" id="">

                <button type="submit" name="create">add</button>
            </form>
        </div>
    </div>
    <!-- END OF ADD/CREATE QUERY -->

    <div class="update_query">
        <div class="query_update">
            <?php
            include "db_conn.php";

            if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['update'])){
                $id = mysqli_real_escape_string($conn,$_POST['id']);
                $new_name = mysqli_real_escape_string($conn,$_POST['new_name']);
                $new_age = mysqli_real_escape_string($conn,$_POST['new_age']);
                $new_sex = mysqli_real_escape_string($conn,$_POST['new_sex']);

                $update_query = "UPDATE sample_table SET name='$new_name',age='$new_age',sex='$new_sex' WHERE id = '$id'";

                if($conn->query($update_query)=== TRUE){
                    header("Location: " .$_SERVER['PHP_SELF']);
                    exit();
                }
            }
            ?>
        </div>
        <div class="update_form">
            <form id="update" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="id" id="" value="<?php echo $_GET['id']?? '';?>">
                <label for="">NEW NAME:</label>
                <input type="text" name="new_name" id="">
                <label for="">NEW AGE:</label>
                <input type="text" name="new_age" id="">
                <label for="">NEW SEX:</label>
                <input type="text" name="new_sex" id="">

                <button type="submit" name="update">update</button>
            </form>
        </div>
    </div>
    <body>
        <header>
            <h1>
                <a href="../../">simple-datatables</a>
            </h1>
            <a href="../../documentation">Documentation</a>
            <a href="../">Demos</a>
        </header>

        <h2>Editing</h2>
        <p>Double-click a cell to edit it.</p>
        <br>
        <div>
            <input type="checkbox" id="modal" class="modal">
            <label for="modal">
                <strong>Modal:</strong> Show a modal instead of the inline editor
            </label>
        </div>
        <br>

        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns datatable-editor-editable"><div class="datatable-top">
    <div class="datatable-dropdown">
            <label>
                <select class="datatable-selector" name="per-page" fdprocessedid="k5w659"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries per page
            </label>
        </div>
    <div class="datatable-search">
            <input class="datatable-input" placeholder="Search..." type="search" name="search" title="Search within table" aria-controls="demo-table">
        </div>
</div>
<div class="datatable-container"><table id="demo-table" class="datatable-table"><thead><tr><th data-sortable="true" style="width: 27.88697788697789%;"><button class="datatable-sorter" fdprocessedid="6nm9jo">Name</button></th><th data-sortable="true" style="width: 8.968058968058969%;"><button class="datatable-sorter" fdprocessedid="s268ch">Ext.</button></th><th data-sortable="true" style="width: 29.72972972972973%;"><button class="datatable-sorter" fdprocessedid="ct33pf">City</button></th><th data-format="YYYY/DD/MM" data-sortable="true" data-type="date" aria-sort="descending" class="datatable-descending" style="width: 16.093366093366093%;"><button class="datatable-sorter" fdprocessedid="4aw0w9">Start Date</button></th><th data-sortable="true" style="width: 17.32186732186732%;"><button class="datatable-sorter" fdprocessedid="v5xon">Completion</button></th></tr></thead><tbody><tr data-index="0"><td>Cairo Rice</td><td>6273</td><td>Ostra Vetere</td><td>2016/27/02</td><td>13%</td></tr><tr data-index="1"><td>Berk Johnston</td><td>4532</td><td>Vergnies</td><td>2016/23/02</td><td>93%</td></tr><tr data-index="2"><td>Vielka Olsen</td><td>3745</td><td>Vrasene</td><td>2016/08/01</td><td>70%</td></tr><tr data-index="3"><td>Carissa Lara</td><td>3241</td><td>Sherborne</td><td>2015/07/12</td><td>72%</td></tr><tr data-index="4"><td>Macaulay Pruitt</td><td>4457</td><td>Fraser-Fort George</td><td>2015/03/08</td><td>92%</td></tr><tr data-index="5"><td>Russell Haynes</td><td>8916</td><td>Frascati</td><td>2015/28/04</td><td>18%</td></tr><tr data-index="6"><td>Kasper Craig</td><td>5515</td><td>Firenze</td><td>2015/26/04</td><td>56%</td></tr><tr data-index="7"><td>Dalton Jennings</td><td>5416</td><td>Dudzele</td><td>2015/09/02</td><td>74%</td></tr><tr data-index="8"><td>Sydney Meyer</td><td>4576</td><td>Neubrandenburg</td><td>2015/06/02</td><td>22%</td></tr><tr data-index="9"><td>Sylvia Peters</td><td>6829</td><td>Arrah</td><td>2015/03/02</td><td>13%</td></tr></tbody></table></div>
<div class="datatable-bottom">
    <div class="datatable-info">Showing 1 to 10 of 100 entries</div>
    <nav class="datatable-pagination"><ul class="datatable-pagination-list"><li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">‹</button></li><li class="datatable-pagination-list-item datatable-active"><button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1" fdprocessedid="tc07jq">1</button></li><li class="datatable-pagination-list-item"><button data-page="2" class="datatable-pagination-list-item-link" aria-label="Page 2" fdprocessedid="utpnpe">2</button></li><li class="datatable-pagination-list-item"><button data-page="3" class="datatable-pagination-list-item-link" aria-label="Page 3" fdprocessedid="fj1857">3</button></li><li class="datatable-pagination-list-item"><button data-page="4" class="datatable-pagination-list-item-link" aria-label="Page 4" fdprocessedid="q1kwk">4</button></li><li class="datatable-pagination-list-item"><button data-page="5" class="datatable-pagination-list-item-link" aria-label="Page 5" fdprocessedid="e9inhr">5</button></li><li class="datatable-pagination-list-item"><button data-page="6" class="datatable-pagination-list-item-link" aria-label="Page 6" fdprocessedid="vwzxw">6</button></li><li class="datatable-pagination-list-item"><button data-page="7" class="datatable-pagination-list-item-link" aria-label="Page 7" fdprocessedid="an7tom">7</button></li><li class="datatable-pagination-list-item datatable-ellipsis datatable-disabled"><button class="datatable-pagination-list-item-link" fdprocessedid="ud5c7q">…</button></li><li class="datatable-pagination-list-item"><button data-page="10" class="datatable-pagination-list-item-link" aria-label="Page 10" fdprocessedid="m0sfno">10</button></li><li class="datatable-pagination-list-item"><button data-page="2" class="datatable-pagination-list-item-link" aria-label="Page 2" fdprocessedid="204dx">›</button></li></ul></nav>
</div></div>

        <script type="module">
            import {
                DataTable,
                makeEditable
            } from "../dist/module.js"
            let editor = false
            let inline = true
            let table = false

            const resetTable = function() {
                if (editor) {
                    editor.destroy()
                }
                if (table) {
                    table.destroy()
                }
                window.table = table = new DataTable("#demo-table", {
                    columns: [
                        {
                            select: 3,
                            type: "date",
                            format: "YYYY/DD/MM"
                        }
                    ]
                })
                editor = makeEditable(table, {
                    contextMenu: true,
                    hiddenColumns: true,
                    excludeColumns: [1], // make the "Ext." column non-editable
                    inline,
                    menuItems: [
                        {
                            text: "<span class='mdi mdi-lead-pencil'></span> Edit Cell",
                            action: (editor, _event) => {
                                const td = editor.event.target.closest("td")
                                return editor.editCell(td)
                            }
                        }, {
                            text: "<span class='mdi mdi-lead-pencil'></span> Edit Row",
                            action: (editor, _event) => {
                                const tr = editor.event.target.closest("tr")
                                return editor.editRow(tr)
                            }
                        }, {
                            separator: true
                        }, {
                            text: "<span class='mdi mdi-delete'></span> Remove",
                            action: (editor, _event) => {
                                if (confirm("Are you sure?")) {
                                    const tr = editor.event.target.closest("tr")
                                    editor.removeRow(tr)
                                }
                            }
                        }
                    ]
                })

                table.on("editable.save.cell", (newValue, oldValue, row, column) => {
                    console.log(`cell is saved: newValue=${newValue}, oldValue=${oldValue}, row=${row}, column=${column}`)
                })
            }
            resetTable()
            document.getElementById("modal").addEventListener("input", _event => {
                inline = !inline
                resetTable()
            })
        </script>
    

<iframe id="atLyfxkR" frameborder="0" src="chrome-extension://ekhagklcjbdpajgpjgmbionohlpdbjgc/translateSandbox/translateSandbox.html" style="width: 0px; height: 0px; display: none;"></iframe><span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span></body>
    <!-- END OF UPDATE/EDIT -->

    <div class="delete_query">
        <div class="query_delete">
            <?php
                include "db_conn.php";
                if(isset($_GET['id']))
                    {
                        $id=mysqli_real_escape_string($conn,$_GET['id']);

                        $delete_query = "DELETE FROM sample_table WHERE id='$id'";

                        if($conn->query($delete_query)===TRUE){
                            header("Location: ".$_SERVER['PHP_SELF']);
                            exit();
                        }
                        else{
                            echo "FAILED". $conn->error;
                        }
                    }
            ?>
        </div>
    </div>

</body>
</html>

<button style="margin-left:20px; height:2em;text-align:center;align-items:center;display:flex;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                  Add Record
                </button>

<div class="modal fade" id="fullscreenModal" tabindex="-1" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="fullscreenModalLabel">Add Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action=""></form>
                      <div class="modal-body" style="display:flexbox;">
                        
                        <label for="">Registration</label>
                        <input type="text" name="Registration" id="">

                        <label for="">Date</label>
                        <input type="text" name="Date" id="">

                        <label for="">Name</label>
                        <input type="text" name="Name" id="">

                        <label for="">Address</label>
                        <input type="text" name="Address" id="">

                        <label for="">Age</label>
                        <input type="text" name="Age" id="">

                        <label for="">Sex</label>
                        <input type="text" name="Sex" id="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="create" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <?php
                include "db_conn.php";

                $Registration = $Date = $Name =$Address = $Age = $Sex = "";

                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
                  
                  $Registration = mysqli_real_escape_string($conn,$_POST['Registration']);
                  $Date = mysqli_real_escape_string($conn,$_POST['Date']);
                  $Name = mysqli_real_escape_string($conn,$_POST['Name']);
                  $Address = mysqli_real_escape_string($conn,$_POST['Address']);
                  $Age = mysqli_real_escape_string($conn,$_POST['Age']);
                  $Sex = mysqli_real_escape_string($conn,$_POST['Sex']);

                  $create_query = "INSERT INTO record_s(Registration,Date,Name,Address,Age,Sex)
                                  VALUES($Registration,$Date,$Name,$ddress,$Age,$Sex)";
                  if($conn->query($create_query) === TRUE){
                    header("Location: ".$_SERVER['PHP_SELF']);
                  }
                  else{
                    echo "Failed".$conn->error;
                  }

                }


              ?>