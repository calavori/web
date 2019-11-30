<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>




<?php $this->start("page") ?>



<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">

            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Staff</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Update information here.</p>
                </div>
            </div>

            <div class="inner-wrapper row">
                <div class="col-md-12">

                    <form name="frm" id="frm" action="/update_staff/<?=$this->e($user['id'])?>" method="post" class="col-md-6 col-md-offset-3">

                        <input type="hidden" name="_csrf_token" value="<?=\App\Csrf::getToken()?>">

                        <!-- Email -->
                        <div class="form-group<?=isset($errors['email']) ? ' has-error' : 'Email must be entered.' ?>">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" maxlen="255" id="email" 
                                placeholder="Enter Email" value="<?=$this->e($user['email'])?>" />

                            <?php if (isset($errors['email'])): ?>
                                <span class="help-block">
                                    <strong><?=$this->e($errors['email'])?></strong>
                                </span>
                            <?php endif ?>                                
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" 
                                placeholder="Enter Password" />
                        </div>

                        <!-- Retype Password -->
                        <div class="form-group">
                            <label for="repass">Retype Password</label>
                            <input type="password" name="repass" class="form-control" id="repass" 
                                placeholder="Retype Password" />
                        </div>

                        
                        <br>
                        <!-- Submit -->
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#frm").validate({
            rules: {
                email: "required",
                repass: {
                    equalTo : "#pass"
                }
            },
            messages: {
                email: "Email must be entered",
                repass: {
                    equalTo : "Password is not matched"
                }
                }
        });
</script>

<?php $this->stop() ?>