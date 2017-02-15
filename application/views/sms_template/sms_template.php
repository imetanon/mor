<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Template</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Template Lists
                    <div class="pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo site_url('/sms-template/add'); ?>" role="button">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Message</th>
                                <th>Position</th>
                                <th>Application</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Template Name</th>
                                <th>Message</th>
                                <th>Position</th>
                                <th>Application</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($sms_templates as $template): ?>
                            <tr>
                                <td><a href="<?php echo site_url('/sms-template/'. $template->sms_template_id); ?>"><?php echo $template->sms_template_name; ?></a></td>
                                <td><?php echo $template->sms_template_message; ?></td>
                                <td><?php echo $template->sms_template_position; ?></td>
                                <td><?php echo $template->application->application_name; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>