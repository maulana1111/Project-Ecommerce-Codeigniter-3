<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Member Area</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Member name</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($member) { ?>
                                <?php foreach($member as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->member_name ?></td>
                                        <td><?php echo $row->email ?></td>
                                        <td><?php echo $row->telp ?></td>
                                        <td><?php echo $row->username ?></td>
                                        <td><?php echo $row->password ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>