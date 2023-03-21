<?php
require("controles/programacao.php");
Processo('editar');
?>		
<br />	<br />								

<h2 class="panel-title">Atualização da Programação</h2>
</header>
<div class="panel-body">
    <form name="form" id="form" class="form-horizontal form-bordered" action="#" method="post">
        <div class="form-group">

            <label class="col-md-3 control-label">Data *</label>
            <div class="col-md-6">
                <div class="input-daterange input-group" data-plugin-datepicker>
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control" name="data_programacao" id="data_programacao" title="O campo Data é obrigatório" value="<?php echo $rsEditar[0]['dataP'];?>" date-format="dd/mm/yyyy">

                </div>
            </div>
        </div>

        <div class="form-group">

            <label class="col-md-3 control-label">Horário *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-bank"></i>
                    </span>
                    <input name="horario" class="form-control" id="horario" title="O campo horário é obrigatório" value="<?php echo $rsEditar[0]['horario'];?>"> 

                </div>
                <font color="red"><b>Exemplo: 10:00 - 12:00</b></font>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-3 control-label">Colégio *</label>
            <div class="col-md-6 control-label">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-tag"></i>
                    </span>
                    <select name="idcolegio" id="idcolegio" class="form-control populate" title="O campo colégio é obrigatório">
                        <?php for ($i = 0; $i < $linha; $i++) { ?>
                            <option value="<?php echo $rs[$i]['idcolegio']; ?>"><?php echo $rs[$i]['descricaocol'] . " - " . $rs[$i]['descpais']; ?></option>										
                        <?php } ?>				
                    </select>
                </div>
            </div>
        </div>



        <div class="form-group">

            <label class="col-md-3 control-label">Tema</label>
            <div class="col-md-6 control-label">

                <div class="input-group">

                    <textarea id="tema" name="tema" rows="5" cols="33">
<?php echo $rsEditar[0]['tema'];?>
																
                    </textarea>

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
document.form.idcolegio.value='<?php echo $rsEditar[0]['idcolegio'];?>';    
</script>    