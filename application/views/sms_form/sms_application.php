<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>SMS Form</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Application
                </div>
                <div class="panel-body">
                    <?php echo form_open('sms-form/form', 'class="form-horizontal"'); ?>
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