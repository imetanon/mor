<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Template - Edit</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $sms_template->sms_template_name; ?>
                    <div class="pull-right">
                        Last Edited: 16-11-2016 16:00 PM
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open('sms-template/edit/'.$sms_template->sms_template_id, 'class="form-horizontal"'); ?>
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
                            <input type="text" class="form-control" id="inputApplication" placeholder="Application Name" value="<?php echo $sms_template->application->application_name; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPosition" class="col-sm-2 control-label">Positon</label>
                        <div class="col-sm-3">
                            <select name="inputPosition" class="form-control">
                              <?php for($i=1; $i<=$count_position; $i++): ?>
                                <option value="<?php echo $i ?>" <?php if($i == $sms_template->sms_template_position){echo "selected";}?>><?php echo $i ?></option>
                              <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTemplateName" class="col-sm-2 control-label">Template Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="inputTemplateName" class="form-control" id="inputTemplateName" placeholder="Template Name" value="<?php echo $sms_template->sms_template_name; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea name="inputMessage" class="form-control" id="inputMessage" rows="3"><?php echo $sms_template->sms_template_message; ?></textarea>
                            <span id="remaining">160 characters remaining</span>
                            <span id="messages">1 message(s)</span>
                            <span id="detail">(TH - 70 characters / EN - 160 characters)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>