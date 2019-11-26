<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- FLASH MESSAGES -->
            <?=$this->fetch("parts/flash", ['messages' => $messages])?> 

            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">               

                    <form class="form-horizontal" role="form" method="POST" action="/login">

                        <input type="hidden" name="_csrf_token" value="<?=\App\Csrf::getToken()?>">
                        
                        <div class="form-group <?=isset($errors['acc']) ? 'has-error' : '' ?>">
                            <label for="acc" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="acc" type="text" class="form-control" name="acc" 
                                    value="<?=isset($old['acc']) ? $this->e($old['acc']) : '' ?>" required autofocus>

                                <?php if (isset($errors['acc'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['acc'])?></strong>
                                    </span>
                                <?php endif ?>                               
                            </div>
                        </div>

                        <div class="form-group <?=isset($errors['password']) ? 'has-error' : '' ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if (isset($errors['password'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['password'])?></strong>
                                    </span>
                                <?php endif ?>                                  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="/register">
                                    You are a new staff?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>
