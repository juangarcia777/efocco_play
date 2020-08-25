<!-- Top Menu Items -->
	

	<nav class="navbar navbar-inverse navbar-fixed-top">
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
				<a class="name_topo" <?php echo 'href="home"'; ?>>EFOCCO ESCOLA TÉCNICA 
					<?php if($CoordenadorTurma!=0){echo '<small> (Coordenador)</small>';} ?>
					<?php if($GerenteAva!=0){echo '<small> (Gerência)</small>';} ?>
					<?php if($AdministradorAVA!=0){echo '<small> (Administrador Geral)</small>';} ?>
					
				</a>
				<ul class="nav navbar-right top-nav pull-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
							
							<img style="width: 43px;" src="assets/imgs/img-user.png" alt="user_auth" class="user-auth-img img-circle"/>
							
							<span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li style="display: none;">
								<a <?php echo 'href="editar_perfil/'.$_SESSION['user_sisconnection_adm'].'"'; ?> ><i class="fa fa-fw fa-user"></i> Perfil</a>
							</li>
							<li style="display: none;" class="divider"></li> 
							<li>
								<a <?php echo 'href="logout"'; ?> ><i class="fa fa-fw fa-power-off"></i> Sair</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="collapse navbar-search-overlap" id="site_navbar_search">
					<form role="search">
						<div class="form-group mb-0">
							<div class="input-search">
								<div class="input-group">	
									<input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
									<span class="input-group-addon pr-30">
									<a  href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
									</span> 
								</div>
							</div>
						</div>
					</form>
				</div>
			</nav>
			<!-- /Top Menu Items -->