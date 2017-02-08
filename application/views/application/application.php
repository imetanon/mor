<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Application</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Application List
                    <div class="pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo site_url('/application/add'); ?>" role="button">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Application Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Application Name</th>
                                <th>Description</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($applications as $application): ?>
                            <tr>
                                <td><a href="<?php echo site_url('/application/'. $application->application_id); ?>"><?php echo $application->application_name ?></a></td>
                                <td><?php echo $application->application_description ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>