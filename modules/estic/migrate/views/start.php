<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/14/2017
 * Time: 3:13 AM
 */

?>
<div class="container">
    <div class="row text-center">
        <div class="col">
        </div>
        <div class="col-5 col-md-auto">
            <button id="btn_admin" type="button" class="btn btn-primary btn-admin" data-toggle="modal" data-target="#userModal">Entrar como administrador</button>
        </div>
        <div class="col">
        </div>
    </div>
</div>

<div class="modal fade show in " id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
     aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn btn-success" id="btn-login" onclick="oUser.login()"><h5 class="modal-title" id="userModalLabel">Ingresar</h5></button>
                <button class="btn btn-primary" id="btn-register" onclick="oUser.regiter()"><h5 class="modal-title" id="userModalLabel">Registrarse</h5></button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= validation_errors()?>
                <?= form_open() ?>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <?= form_input('email','','id="login-email" class="form-control" placeholder="username or email"')?>
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                    <?= form_password('password','','id="login-password" class="form-control" placeholder="password"')?>
                </div>


                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <?= form_submit('login','Ingresar','id="btn-login" class="btn btn-success"')?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Don't have an account!
                            <a href="<?php echo base_url('register') ?>">
                                Sign Up Here
                            </a>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer ">
                <button id="cerrar" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#userModal').modal('show')
    });
</script>