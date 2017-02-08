<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1>Application - Add</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Application
                </div>
                <div class="panel-body">
                    <?php echo form_open('application/save', 'class="form-horizontal"'); ?>
                        <?php if(validation_errors()):?>
                        <div class="alert alert-warning alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Warning!</strong> <?php echo validation_errors(); ?>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="inputApplicationName" class="col-sm-2 control-label">Application Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="inputApplicationName" class="form-control" id="inputApplicationName" placeholder="Application Name" value="<?php echo set_value('inputApplicationName'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="inputDescription" id="inputDescription" rows="5"></textarea>
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