<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>All Logs</h1>
        </div>
    </div>
    <!--<div class="row">-->
    <!--    <div class="col-lg-12">-->
    <!--        <div class="panel panel-default">-->
    <!--            <div class="panel-body">-->
    <!--                <form class="form-inline">-->
    <!--                    <div class="form-group">-->
    <!--                        <label for="exampleInputName2">Date From</label>-->
    <!--                        <div class='input-group date' id='datetimepicker6'>-->
    <!--                            <input type='text' class="form-control" />-->
    <!--                            <span class="input-group-addon">-->
    <!--                                                            <span class="glyphicon glyphicon-calendar"></span>-->
    <!--                            </span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="form-group">-->
    <!--                        <label for="exampleInputEmail2">Date To</label>-->
    <!--                        <div class='input-group date' id='datetimepicker7'>-->
    <!--                            <input type='text' class="form-control" />-->
    <!--                            <span class="input-group-addon">-->
    <!--                                                            <span class="glyphicon glyphicon-calendar"></span>-->
    <!--                            </span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <button type="submit" class="btn btn-default">Filter</button>-->
    <!--                    <button type="submit" class="btn btn-default">Clear</button>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Log Lists
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <!--<th>DateTime</th>-->
                                <th>Application</th>
                                <th>To</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>DateTime</th>-->
                                <th>Application</th>
                                <th>To</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($sms_logs as $sms_log): ?>
                            <tr>
                                <!--<td>16-11-2016 16:00 PM</td>-->
                                <td><?php echo $sms_log->application->application_name; ?></td>
                                <td><?php echo $sms_log->sms_log_to; ?></td>
                                <td><?php echo $sms_log->sms_log_message; ?></td>
                                <td>Sended</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>