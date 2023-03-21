<?php
require_once('controles/index.php');
Processo('inicio'); 
?>
            <div class="inner-wrapper">

	

					<!-- start: page -->

					<div class="row">

						

						<div class="col-md-6 col-lg-12 col-xl-6">

							<div class="row">
							 

								<div class="col-md-12 col-lg-6 col-xl-6">

									<section class="panel panel-featured-left panel-featured-tertiary">

										<div class="panel-body">

											<div class="widget-summary">

												<div class="widget-summary-col widget-summary-col-icon">

													<div class="summary-icon bg-tertiary">

														<i class="fa fa-copy"></i>

													</div>

												</div>

												<div class="widget-summary-col">

													<div class="summary">

														<h4 class="title">Lista de participantes inscritos</h4>

														<div class="info" align="center">

															<strong class="amount"><?php echo "Total: ".$total;?></strong>

														</div>

													</div>

													<div class="summary-footer">

														<a href="default.php?pg=<?php echo base64_encode('visao/relatorio/consulta_participantes.php');?>" class="text-muted text-uppercase"><b>Acessar</b></a>

													</div>

												</div>

											</div>

										</div>

									</section>

								</div>

								

                                

							</div>

						</div>

					</div>



					

							</section>

						</div>

					</div>

					