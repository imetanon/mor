<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Application - Edit</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Application
                    <div class="pull-right">
                        Last Edited: 16-11-2016 16:00 PM
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open('application/edit/'.$application->application_id, 'class="form-horizontal"'); ?>
                    <?php if(validation_errors()):?>
                    <div class="alert alert-warning alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php endif;?>
                    <?php if($this->session->flashdata('success')):?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Well done!</strong>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif;?>
                    <div class="form-group">
                        <label for="inputDepartmentName" class="col-sm-2 control-label">Application Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="inputApplicationName" class="form-control" id="inputDepartmentName" placeholder="Department Name" value="<?php echo $application->application_name ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="inputDescription" id="inputDescription" rows="5"><?php echo $application->application_description ?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $this->uri->segment(2); ?>" />
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?php echo site_url('/application/delete/'.$application->application_id); ?>" class="btn btn-danger" role="button">Delete</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    SMS-Template
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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Template Name</th>
                                <th>Message</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($application->sms_templates as $template): ?>
                            <tr>
                                <td><a href="<?php echo site_url('/sms-template/'. $template->sms_template_id); ?>"><?php echo $template->sms_template_name; ?></a></td>
                                <td>
                                    <?php echo $template->sms_template_message; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>