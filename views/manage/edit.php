<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">

            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Members</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Update information here.</p>
                </div>
            </div>

            <div class="inner-wrapper row">
                <div class="col-md-12">

                    <form name="frm" id="frm" action="/update/<?=$this->e($member['id'])?>" method="post" class="col-md-6 col-md-offset-3">

                        <input type="hidden" name="_csrf_token" value="<?=\App\Csrf::getToken()?>">

                        <!-- Name -->
                        <div class="form-group<?=isset($errors['name']) ? ' has-error' : '' ?>">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" maxlen="255" id="name" 
                                placeholder="Enter Name" value="<?=$this->e($member['name'])?>" />

                            <?php if (isset($errors['name'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['name'])?></strong>
                                </span>
                            <?php endif ?>                                
                        </div>

                        <!-- Phone -->
                        <div class="form-group<?=isset($errors['phone']) ? ' has-error' : '' ?>">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" 
                                placeholder="Enter Phone" value="<?=$this->e($member['phone'])?>" />

                            <?php if (isset($errors['phone'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['phone'])?></strong>
                                </span>
                            <?php endif ?>                                  
                        </div>

                        <!-- Start Date -->
                        <div class="form-group<?=isset($errors['start']) ? ' has-error' : '' ?>">
                            <label for="start">Start Date</label>
                            <input type="date" name="start" class="form-control" id="start" 
                                value="<?=date('Y-m-d', strtotime($this->e($member['start'])))?>" />
                            <?php if (isset($errors['start'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['start'])?></strong>
                                </span>
                            <?php endif ?>                                 
                        </div>

                        <!-- End Date -->
                        <div class="form-group<?=isset($errors['start']) ? ' has-error' : '' ?>">
                            <label for="end">End Date</label>
                            <input type="date" name="end" class="form-control" id="end" 
                                value="<?=date('Y-m-d', strtotime($this->e($member['end'])))?>" />
                            <?php if (isset($errors['end'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['end'])?></strong>
                                </span>
                            <?php endif ?>                                 
                        </div>

                        <!-- Submit -->
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>