<?php
require("controles/evento.php");
Processo('incluir');
?>		
<br />	<br />								

<h2 class="panel-title">Cadastro de Evento</h2>
</header>
<div class="panel-body">
    <form name="form" id="form" class="form-horizontal form-bordered" action="#" method="post">
        

        <div class="form-group">

            <label class="col-md-3 control-label">Evento *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-bank"></i>
                    </span>
                    <input name="descricao" class="form-control" id="descricao" title="O campo Evento é obrigatório"> 

                </div>
            </div>
        </div>

        <div class="form-group">

            <label class="col-md-3 control-label">Data de início*</label>
            <div class="col-md-6">
                <div class="input-daterange input-group" data-plugin-datepicker>
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control" name="data_inicio" id="data_inicio" title="O campo Data de Início é obrigatório">

                </div>
            </div>
        </div>

        <div class="form-group">

            <label class="col-md-3 control-label">Data de Término *</label>
            <div class="col-md-6">
                <div class="input-daterange input-group" data-plugin-datepicker>
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control" name="data_termino" id="data_termino" title="O campo Data de Término é obrigatório">

                </div>
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="col-md-3 control-label">Tipo de Evento *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-tag"></i>
                    </span>
                    <select name="idtipo_evento" id="idtipo_evento" class="form-control populate" title="O campo Tipo de Evento é obrigatório">
                        <?php for ($i = 0; $i < $linha; $i++) { ?>
                            <option value="<?php echo $rs[$i]['idtipo_evento']; ?>"><?php echo $rs[$i]['descricao']; ?></option>										
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

