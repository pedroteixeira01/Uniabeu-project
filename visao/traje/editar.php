<?php
require("controles/traje.php");
Processo('editar');
?>		
<br />	<br />								

<h2 class="panel-title">Atualização de Traje</h2>
</header>
<div class="panel-body">
    <form name="form" id="form" class="form-horizontal form-bordered" action="#" method="post">
        

        <div class="form-group">

            <label class="col-md-3 control-label">Traje *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-bank"></i>
                    </span>
                    <input name="descricao" class="form-control" id="descricao" title="O campo Traje é obrigatório" value="<?php echo $rsEditar[0]['descricao'];?>"> 

                </div>
            </div>
        </div>

       
        
        
        <div class="form-group">
            <label class="col-md-3 control-label">Evento *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-tag"></i>
                    </span>
                    <select name="idevento" id="idevento" class="form-control populate" title="O campo Evento é obrigatório">
                        <?php for ($i = 0; $i < $linha; $i++) { ?>
                            <option value="<?php echo $rs[$i]['idevento']; ?>"><?php echo $rs[$i]['descricao']; ?></option>										
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


<script>
document.form.idevento.value='<?php echo $rsEditar[0]['idevento'];?>';    
</script>    