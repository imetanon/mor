<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Workflow</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Workflow List
                    <div class="pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo site_url('/workflow/add'); ?>" role="button">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Workflow Name</th>
                                <th>Description</th>
                                <th>Application</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Workflow Name</th>
                                <th>Description</th>
                                <th>Application</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($workflows as $workflow): ?>
                            <tr>
                                <td><a href="<?php echo site_url('/workflow/'. $workflow->workflow_id); ?>"><?php echo $workflow->workflow_name ?></a></td>
                                <td><?php echo $workflow->workflow_description; ?></td>
                                <td><?php echo $workflow->application->application_name; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>