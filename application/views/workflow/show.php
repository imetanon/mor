<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Workflow - Edit</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Workflow
                    <div class="pull-right">
                        Last Edited: 16-11-2016 16:00 PM
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open('workflow/edit/'.$workflow->workflow_id, 'class="form-horizontal"'); ?>
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
                        <label for="inputApplication" class="col-sm-2 control-label">Application</label>
                        <div class="col-sm-4">
                            <input type="text" name="inputApplicationName" class="form-control" id="inputApplicationName" placeholder="Application Name" value="<?php echo $workflow->application->application_name; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputWorkflowName" class="col-sm-2 control-label">Workflow Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="inputWorkflowName" class="form-control" id="inputWorkflowName" placeholder="Workflow Name" value="<?php echo $workflow->workflow_name ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="inputDescription" id="inputDescription" rows="5"><?php echo $workflow->workflow_description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStep1" class="col-sm-2 control-label">Step 1</label>
                        <div class="col-sm-3">
                            <input type="text" name="inputStep1" class="form-control" id="inputStep1" placeholder="Process1" value="<?php echo $workflow_process1; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStep2" class="col-sm-2 control-label">Step 2</label>
                        <div class="col-sm-3">
                            <input type="text" name="inputStep2" class="form-control" id="inputStep2" placeholder="Process2" value="<?php echo $workflow_process2; ?>">
                        </div>
                        <label for="inputDue2" class="col-sm-2 control-label">Due</label>
                        <div class="col-sm-2">
                            <input type="text" name="inputDue2" class="form-control" id="inputDue2" placeholder="Days Amount" value="<?php echo $workflow_process2_due; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStep3" class="col-sm-2 control-label">Step 3</label>
                        <div class="col-sm-3">
                            <input type="text" name="inputStep3" class="form-control" id="inputStep3" placeholder="Process3" value="<?php echo $workflow_process3; ?>">
                        </div>
                        <label for="inputDue3" class="col-sm-2 control-label">Due</label>
                        <div class="col-sm-2">
                            <input type="text" name="inputDue3" class="form-control" id="inputDue3" placeholder="Days Amount" value="<?php echo $workflow_process3_due; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <!--<a href="<?php echo site_url('/worflow/delete/'.$workflow->workflow_id); ?>" class="btn btn-danger" role="button">Delete</a>-->
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>