<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Workflow - Add</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Workflow
                </div>
                <div class="panel-body">
                    <?php echo form_open('workflow/save', 'class="form-horizontal"'); ?>
                    <?php if(validation_errors()):?>
                    <div class="alert alert-warning alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php endif;?>
                    <div class="form-group">
                        <label for="inputApplication" class="col-sm-2 control-label">Application</label>
                        <div class="col-sm-4">
                            <select name="inputApplication" class="form-control">
                                <?php foreach ($applications as $application): ?>
                                <option value="<?php echo $application->application_id; ?>"><?php echo $application->application_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary" href="<?php echo site_url('/application/add'); ?>" role="button">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Application
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputWorkflowName" class="col-sm-2 control-label">Workflow Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="inputWorkflowName" class="form-control" id="inputWorkflowName" placeholder="Workflow Name" value="<?php echo set_value('inputWorkflowName'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="inputDescription" id="inputDescription" rows="5"><?php echo set_value('inputDescription'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStep1" class="col-sm-2 control-label">Step 1</label>
                        <div class="col-sm-3">
                            <input type="text" name="inputStep1" class="form-control" id="inputStep1" placeholder="Process1" value="<?php echo set_value('inputStep1'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStep2" class="col-sm-2 control-label">Step 2</label>
                        <div class="col-sm-3">
                            <input type="text" name="inputStep2" class="form-control" id="inputStep2" placeholder="Process2" value="<?php echo set_value('inputStep2'); ?>">
                        </div>
                        <label for="inputDue2" class="col-sm-2 control-label">Due</label>
                        <div class="col-sm-2">
                            <input type="text" name="inputDue2" class="form-control" id="inputDue2" placeholder="Days Amount" value="<?php echo set_value('inputDue2'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStep3" class="col-sm-2 control-label">Step 3</label>
                        <div class="col-sm-3">
                            <input type="text" name="inputStep3" class="form-control" id="inputStep3" placeholder="Process3" value="<?php echo set_value('inputStep3'); ?>">
                        </div>
                        <label for="inputDue3" class="col-sm-2 control-label">Due</label>
                        <div class="col-sm-2">
                            <input type="text" name="inputDue3" class="form-control" id="inputDue3" placeholder="Days Amount" value="<?php echo set_value('inputDue3'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>