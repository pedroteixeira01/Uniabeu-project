<?php
require("controles/colegio.php");
Processo('incluir');
?>		
<br />	<br />								

<h2 class="panel-title">Cadastro de Colégio</h2>
</header>
<div class="panel-body">
    <form name="form" id="form" class="form-horizontal form-bordered" action="#" method="post">
        

        <div class="form-group">

            <label class="col-md-3 control-label">Colégio *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-bank"></i>
                    </span>
                    <input name="descricao" class="form-control" id="descricao" title="O campo Colégio é obrigatório"> 

                </div>
            </div>
        </div>

       
        
        
        <div class="form-group">
            <label class="col-md-3 control-label">País *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-tag"></i>
                    </span>
                    <select name="idpais" id="idpais" class="form-control populate" title="O campo País é obrigatório">
                        <?php for ($i = 0; $i < $linha; $i++) { ?>
                            <option value="<?php echo $rs[$i]['idpais']; ?>"><?php echo $rs[$i]['descricao']; ?></option>										
                        <?php } ?>				
                    </select>
                </div>
            </div>
        </div>

        <br>

        <footer class="panel-footer">
            <div class="row" align="center">
                <input type="hidden" name="ok" id="ok">
                <button class="btn btn-primary" onClick="validar(document.form);" type="button">Salvar</button>
                <button type="reset" class="btn btn-default">Reset</button>

            </div>
        </footer>

    </form>
</div>
</section>
</div>
</div>

