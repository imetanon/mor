<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Template - Add</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Template
                </div>
                <div class="panel-body">
                    <?php echo form_open('sms-template/save', 'class="form-horizontal"'); ?>
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
                    <!--<div class="form-group">-->
                    <!--    <label for="inputPosition" class="col-sm-2 control-label">Positon</label>-->
                    <!--    <div class="col-sm-3">-->
                    <!--        <select name="inputPosition" class="form-control">-->
                    <!--                          <option>1</option>-->
                    <!--                          <option>2</option>-->
                    <!--                          <option>3</option>-->
                    <!--                          <option>4</option>-->
                    <!--                          <option>5</option>-->
                    <!--                        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="form-group">
                        <label for="inputTemplateName" class="col-sm-2 control-label">Template Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="inputTemplateName" class="form-control" id="inputTemplateName" placeholder="Template Name" value="<?php echo set_value('inputTemplateName'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea name="inputMessage" class="form-control" id="inputMessage" rows="3"><?php echo set_value('inputMessage'); ?></textarea>
                            <span id="remaining">160 characters remaining</span>
                            <span id="messages">1 message(s)</span>
                            <span id="detail">(TH - 70 characters / EN - 160 characters)</span>
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