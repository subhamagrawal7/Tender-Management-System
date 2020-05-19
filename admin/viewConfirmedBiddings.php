<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:index.php');  //As session as already been destroyed in logout.php thus it should not be set
}
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Confirmed Biddings</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <?php
                    require 'includes/dbh.inc.php';

                    $sql = "SELECT O.OrgName,O.OrgEmail,B.Charge,B.Months,T.Department,T.TenderNo,T.OrgID FROM tender T,bids B,organization O WHERE B.TenderID=T.TenderID AND T.OrgID IS NOT NULL AND T.OrgID=O.OrgID";
                    $query = mysqli_query($conn, $sql);
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                    <tr>
                                        <th>Org Name</th>
                                        <th>Org Email</th>
                                        <th>Charge</th>
                                        <th>No. of Months Taken</th>
                                        <th>Department</th>
                                        <th>Tender No.</th>
                                        <th>Close</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr id="table_row">
                                                <td><?php echo $row['OrgName'] ?></td>
                                                <td><?php echo $row['OrgEmail'] ?></td>
                                                <td><?php echo $row['Charge'] ?></td>
                                                <td><?php echo $row['Months'] ?></td>
                                                <td><?php echo $row['Department'] ?></td>
                                                <td><?php echo $row['TenderNo'] ?></td>
                                                <td>
                                                    <a href="javascript:HideRow();" class="btn btn-danger" id="close">X</a>
                                                    <script type="application/x-javascript">
                                                        function HideRow() {
                                                            $("#table_row").remove();
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <div class="my-2"></div>
            </div>
        </div>
    </div>


    <?php
    include('includes/footer.php');
    include('includes/scripts.php');
    ?>