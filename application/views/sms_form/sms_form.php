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
                    SMS Form
                </div>
                <div class="panel-body">
                    <?php echo form_open('sms_form/send', 'class="form-horizontal" id="sms-form"'); ?>
                        <?php if(validation_errors()):?>
                        <div class="alert alert-warning alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Warning!</strong> <?php echo validation_errors(); ?>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="inputSendCheckbox" class="col-sm-2 control-label">Send SMS</label>
                            <div class="col-sm-4">
                                <div class="checkbox">
                                    <label>
                                                  <input id="send-checkbox" name="send-checkbox" type="checkbox">
                                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTemplate" class="col-sm-2 control-label">Workflow</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                              <option>Department A -- Department B -- Department C</option>
                                              <option>Department B -- Department C</option>
                                              <option>Department B -- Department C -- Department A</option>
                                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTo" class="col-sm-2 control-label">Telephone Number</label>
                            <div class="col-sm-2">
                                <input name="inputTo" type="text" class="form-control" id="inputTo" placeholder="08xxxxxxxx">
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox"> Get From User Profile
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTemplate" class="col-sm-2 control-label">Template</label>
                            <div class="col-sm-8">
                                <select name="inputTemplate" id="sms-select-template" class="form-control">
                                  <option value="0">--</option>
                                    <?php foreach ($sms_templates as $template): ?>
                                    <option data-sms="<?php echo $template->sms_template_message; ?>" value="<?php echo $template->sms_template_id; ?>"><?php echo $template->sms_template_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputMessage" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea name="inputMessage" class="form-control" id="inputMessage" rows="3"></textarea>
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