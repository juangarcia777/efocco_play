<!-- Left Sidebar Menu -->
			<?php
				$sel_duvidas = $db->select("SELECT COUNT(*) AS total FROM duvidas_aulas WHERE resposta=''");
				$total_duvidas = $db->expand($sel_duvidas);
				$total_duvidas = $total_duvidas['total'];
			?>

			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">

				<?php if($CoordenadorTurma==1 || $AdministradorAVA==1) { ?>	

					<li class="principal">

						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_list"><i class="icon-list mr-10"></i>Listagem <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="app_list" class="collapse collapse-level-1">
							<li>
								<a <?php echo 'href="listar_alunos"'; ?> >Alunos</a>
							</li>
							<li>
								<a <?php echo 'href="listar_adm"'; ?> >Coordenadores</a>
							</li>

							<li>
								<a <?php echo 'href="listar_professores"'; ?> >Professores</a>
							</li>

							
							<li>
								<a <?php echo 'href="listar_cursos"'; ?> >Cursos</a>
							</li>
							
							<li>
								<a <?php echo 'href="listar_turmas"'; ?> >Turmas</a>
							</li>

							<li>
								<a <?php echo 'href="listar_disciplinas"'; ?> >Disciplinas</a>
							</li>
							
							
						</ul>
					</li>

					<li class="principal">
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_add"><i class="icon-plus mr-10"></i>Cadastrar <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="app_add" class="collapse collapse-level-1">
							<li>
								<a <?php echo 'href="cadastrar_alunos"'; ?> >Alunos</a>
							</li>


							<li>
								<a <?php echo 'href="cadastrar_cursos"'; ?> >Cursos</a>
							</li>

							<li>
								<a <?php echo 'href="cadastrar_turma"'; ?> >Turmas</a>
							</li>

							<li>
								<a <?php echo 'href="cadastrar_professores"'; ?> >Professores/Coord.</a>
							</li>

							<li>
								<a <?php echo 'href="cadastrar_disciplinas"'; ?> >Disciplinas</a>
							</li>
							
							
						</ul>
					</li>

					<li class="principal">
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_upload"><i class="icon-doc mr-10"></i>Upload Excel <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="app_upload" class="collapse collapse-level-1">
							<li>
								<a <?php echo 'href="csv_alunos"'; ?> >Alunos</a>
							</li>
							<li style="display: none;">
								<a <?php echo 'href="csv_turma"'; ?> >Turma</a>
							</li>
						</ul>
					</li>



					<li class="principal">
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_aloc"><i class="icon-link mr-10"></i>Alocações <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="app_aloc" class="collapse collapse-level-1">

							<li>
								<a <?php echo 'href="alunos_turmas"'; ?>>Alunos em Turmas</a>
							</li>

							<li style="display: none;">
								<a <?php echo 'href="disciplinas_turmas"'; ?>>Disciplinas em Turmas</a>
							</li>

							<li style="display: none;">
								<a <?php echo 'href="turmas_cursos"'; ?> >Turmas em Cursos</a>
							</li>
							
						</ul>
					</li>


					

			<?php } ?>

					<li class="principal">
						<a <?php echo 'href="duvidas"'; ?>><i class="icon-question mr-10"></i> Dúvidas de Alunos 
							&nbsp;&nbsp;
							<?php if($total_duvidas>0){ ?>
								<span class="badge badge-primary"><?php echo $total_duvidas; ?></span>
							<?php } ?>	
						</a>	
					</li>


					<li class="principal">
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_alocxx"><i class="icon-graph mr-10"></i>Relatórios <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="app_alocxx" class="collapse collapse-level-1">

							<li>
								<a href="relatorios/acessos">Acessos</a>
							</li>

							
						</ul>
					</li>

						

					<li class="principal">
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><i class="icon-graduation mr-10"></i>Minhas Turmas<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="dropdown_dr_lv1" class="collapse collapse-level-1">

							<?php

								$where_menu = " disciplinas.professor='$id_logado'";
								$where_menu2 = " AND disciplinas.professor = '$id_logado'";								

								//VERIFICA SE É COORDENADOR
								if($CoordenadorTurma!=0){
									$where_menu = " turma.coordenador_turma='$id_logado'";
									$where_menu2 ='';
								}

								//VERIFICA SE É ADMINISTRADOR
								if($AdministradorAVA!=0){									
									$where_menu = " turma.id!='0'";
									$where_menu2 ='';
								}


								// SELECIONO AS TURMAS QUE AQUELE PROFESSOR LECIONA
								$sel_turmas = $db->select("SELECT turma.id AS id_turma, turma.nome AS nome_turma 
									FROM turma 
									LEFT JOIN turma_disciplinas ON turma.id = turma_disciplinas.id_turma
									LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina = disciplinas.id
									WHERE $where_menu
									GROUP BY turma.id
									ORDER BY turma.nome
									");

								if($db->rows($sel_turmas)){									
								$turmas = array();
								$i=0;
								while($linha_turmas = $db->expand($sel_turmas)){									
									$turmas[] = array('id_turma' => $linha_turmas['id_turma'], 'nome_turma' => $linha_turmas['nome_turma']);
									$i++;
								}

				

								foreach ($turmas as $value) {
									
									$id_turma_pesq_menu = $value['id_turma'];
									$nome_turma = $value['nome_turma'];

										// SELECIONO AS DISCIPLINAS QUE AQUELE PROFESSOR LECIONA
										$sel_disciplinas = $db->select("SELECT disciplinas.id, disciplinas.nome, turma_disciplinas.id_disciplina 
											FROM disciplinas 
											LEFT JOIN turma_disciplinas ON disciplinas.id = turma_disciplinas.id_disciplina 
											WHERE turma_disciplinas.id_turma='$id_turma_pesq_menu' $where_menu2");

										if($db->rows($sel_disciplinas)) {

											echo '
												<li>
													<a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_'.$id_turma_pesq_menu.'">'.$nome_turma.'<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span>
													</a>
													<ul id="dropdown_dr_'.$id_turma_pesq_menu.'" class="collapse collapse-level-2">
												';

												while ($row = $db->expand($sel_disciplinas)) {
													echo '
														<li>
															<a href="prof_lista_disciplina/'.$id_turma_pesq_menu.'/'.$row['id'].'">'.$row['nome'].'</a>
														</li>
													';
												}

											echo 
											   '</ul>
											</li>
											';


										} else {

											echo '
												<li>
													<a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_'.$id_turma_pesq_menu.'">'.$nome_turma.'<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span>
													</a>
													<ul id="dropdown_dr_'.$id_turma_pesq_menu.'" class="collapse collapse-level-2">

													<li>
														<a href="javascript:void(0);">Nenhuma disciplina!</a>
													</li>
												';

											
											echo 
											   '</ul>
											</li>
											';

										}

									}

								} else {

									echo '<li><a href="javascript:void(0)">Nenhuma turma atribuída.</a></li>';

								}
							
								
								
							?>

						</ul>
					</li>

					
					

				</ul>
			</div>
			<!-- /Left Sidebar Menu -->