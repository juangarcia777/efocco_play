<!-- Left Sidebar Menu -->
			<?php
				$sel_duvidas = $db->select("SELECT COUNT(*) AS total FROM duvidas_aulas WHERE resposta='' AND data_resposta='0000-00-00 00:00:00'");
				$total_duvidas = $db->expand($sel_duvidas);
				$total_duvidas = $total_duvidas['total'];

				$sel_duvidas = $db->select("SELECT COUNT(*) AS total FROM suporte_plataforma WHERE resposta='' ");
				$total_duvidas2 = $db->expand($sel_duvidas);
				$total_duvidas2 = $total_duvidas2['total'];
			?>

			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">

					

				<?php if($CoordenadorTurma==1 || $AdministradorAVA==1 || isset($_SESSION['GerenteLogadoAVA'])) { ?>	

					<li class="principal">

						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_list"><i class="icon-list mr-10"></i>Cadastros <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
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
						<a <?php echo 'href="suporte"'; ?>><i class="fa fa-comments-o mr-10"></i> Suporte 
							&nbsp;&nbsp;
							
							<?php  if($total_duvidas2>0){ ?>
								<span class="badge badge-primary"><?php echo $total_duvidas2; ?></span>
							<?php }?>	
						</a>	
					</li>

					<li class="principal">
						<a href="cadastro_avisos"><i class="fa fa-exclamation mr-10"></i>
						Quadro de Avisos	
						</a>	
					</li>


					<li class="principal">
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_alocxx"><i class="icon-graph mr-10"></i>Relatórios <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="app_alocxx" class="collapse collapse-level-1">

							<li><a href="relatorios/gerencial">Gerencial</a></li>
							<li><a href="relatorios/acessos">Acessos</a></li>
							<li><a href="relatorios/avaliacao">Avaliações de Aulas</a></li>

							
						</ul>
					</li>

						



					<li class="">
						<a href="lista-aulas"><button class="btn btn-success btn-block">AULAS</button></a>	
					</li>

					<!-- <li class="">
						<a href="certificados"><button class="btn btn-primary btn-block">CERTIFICADOS</button></a>	
					</li>	 -->
					
					

				</ul>
			</div>
			<!-- /Left Sidebar Menu -->