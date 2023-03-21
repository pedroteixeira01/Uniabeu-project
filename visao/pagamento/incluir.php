										<h2 class="panel-title">Cadastro de Pagamento</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="#">
											<div class="form-group">
												<label class="col-md-3 control-label">Termo de Contrato</label>
												<div class="col-md-6 control-label">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-tag"></i>
															</span>
                                                            <select name="idcontrato" id="idcontrato" class="form-control populate">
                                                                    <option value="AK">Alaska</option>
                                                                    <option value="HI">Hawaii</option>														
                                                            </select>
														</div>
													</div>
											</div>
						
											<div class="form-group">
                                                
												<label class="col-md-3 control-label">Fatura</label>
												<div class="col-md-6 control-label">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-bank"></i>
															</span>
															<input id="product-key" class="form-control">
														</div>
													</div>
											</div>
                                            
                                            <div class="form-group">
                                                
												<label class="col-md-3 control-label">Vencimento</label>
												<div class="col-md-6">
													<div class="input-daterange input-group" data-plugin-datepicker>
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" class="form-control" name="start">
														
													</div>
												</div>
											</div>
                                            
                                            
                                            <div class="form-group">
                                                
												<label class="col-md-3 control-label">Valor</label>
												<div class="col-md-6">
													<div class="input-group mb-md">
														<span class="input-group-addon">R$</span>
														<input type="text" class="form-control">
														<span class="input-group-addon ">,00</span>
													</div>
												</div>
											</div>
                                            
						
											<div class="form-group">
												<label class="col-md-3 control-label">Situação </label>
												<div class="switch switch-sm switch-success">
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
													</div>
                                                    
											</div>
						
						<br>
                        
                                   <footer class="panel-footer">
										<div class="row" align="center">
											
												<button class="btn btn-primary">Salvar</button>
												<button type="reset" class="btn btn-default">Reset</button>
											
										</div>
									</footer>
						
										</form>
									</div>
								</section>
							</div>
						</div>