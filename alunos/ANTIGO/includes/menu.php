<?php $DadosAluno = $Pesquisa->DadosAluno(); ?>
<header>
        <div class="header-top sticky d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <!-- header top navigation start -->
                        <div class="header-top-navigation">
                            <nav>
                                <ul>
                                    <li class="active"><a href="home">Ínicio</a></li>
                                    <li class="msg-trigger sobe-menu"><a class="msg-trigger-btn" href="#meus-cursos-exibe">Meus Cursos <i class="icofont-thin-down"></i></a>
                                        <div class="message-dropdown limit-width" id="meus-cursos-exibe">
                                            <div class="dropdown-title">
                                                <p class="recent-msg">Cursos Ativos</p>                                                
                                            </div>
                                            <ul class="dropdown-msg-list">
                                                
                                                <?php
                                                    $turmas_aluno = $Pesquisa->TurmasAluno();
                                                    if(!empty($turmas_aluno)){
                                                    while($line = $db->expand($turmas_aluno)){
                                                ?>
                                                
                                                <li class="msg-list-item d-flex justify-content-between">
                                                                                                    
                                                    <div class="msg-content">
                                                        <h6 class="author">
                                                            <a href="meus-cursos/<?php echo $line['id_turma']; ?>/<?php echo normaliza($line['nome']); ?>"><?php echo $line['nome']; ?></a>
                                                        </h6>
                                                        <p>Inicia em: <?php echo data_mysql_para_user($line['data_entrada']); ?></p>
                                                    </div>                                                    

                                                </li>

                                                <?php
                                                }}
                                                ?>
                                    
                                            
                                            </ul>
                                            <div class="msg-dropdown-footer">
                                                <span><?php echo Numeros($db->rows($turmas_aluno)); ?> cursos ativos no total</span>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li><a href="https://efocco.wpensar.com.br/login" target="_blank">Financeiro</a></li>

                                    <li class="notification-trigger  sobe-menu"><a class="msg-trigger-btn" href="#avisos-exibe">Avisos <span class="label label-primary avisos-topo hide"></a>
                                        <div class="message-dropdown" id="avisos-exibe">
                                            <div class="dropdown-title">
                                                <p class="recent-msg">Avisos</p>
                                               
                                            </div>
                                            <ul class="dropdown-msg-list" id="list-avisos-topo">
                                                <li class="aguarde-avisos text-center"><img src="assets/images/loader.gif"></li>
                                            </ul>
                                            <div class="msg-dropdown-footer hide">
                                                <span>ver todos os avisos</span>
                                            </div>
                                        </div>
                                    </li>

                                    
                                </ul>
                            </nav>
                        </div>
                        <!-- header top navigation start -->
                    </div>

                    <div class="col-md-2">
                        <!-- brand logo start -->
                        <div class="brand-logo text-center">
                            <a href="home">
                                <img src="images/efocco-branca.png" class="logo_topo">
                            </a>
                        </div>
                        <!-- brand logo end -->
                    </div>

                    <div class="col-md-5">
                        <div class="header-top-right d-flex align-items-center justify-content-end">
                           
                           
                            <input type="checkbox" data-size="sm"  data-toggle="toggle" data-on="Dark" data-off="Light"  data-onstyle="dark" data-offstyle="light" class="botao-dark-topo" id="toggle-event" <?php if(isset($_SESSION['DarkThemeAVA'])){ echo 'checked'; }?>>


                            <!-- profile picture start -->
                            <div class="profile-setting-box">
                                <div class="profile-thumb-small">
                                    <a href="javascript:void(0)" class="profile-triger profile-ball">
                                        <i class="icofont-user-alt-3"></i>
                                    </a>
                                    <div class="profile-dropdown">
                                        <div class="profile-head">
                                            <h5 class="name"><?php echo $DadosAluno['nome']; ?></h5>
                                            <a class="mail" href="javascript:void(0)"><?php echo $DadosAluno['email_aluno']; ?></a>
                                        </div>
                                        <div class="profile-body">
                                            <ul >
                                                <li><a href="profile"><i class="icofont-user-alt-3"></i> Meus Dados</a></li>

                                            </ul>
                                            <ul >
                                                <li><a href="minhas-duvidas"><i class="icofont-question-circle"></i> Minhas Dúvidas</a></li>
                                                                                               
                                            </ul>
                                            <ul>
                                                
                                                <li><a href="logout"><i class="icofont-logout"></i> Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- profile picture end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <header >
        <div class="mobile-header-wrapper sticky d-block d-lg-none" >
            <div class="mobile-header position-relative ">
                <div class="mobile-logo">
                    <a href="home">
                        <img src="images/efocco-branca.png" class="logo_topo logo_mobile">
                    </a>
                </div>
                <div class="mobile-menu w-100" style="display: none;">
                    <ul>
                        <li>
                            <button class="notification request-trigger"><i class="flaticon-users"></i>
                                <span>03</span>
                            </button>
                            <ul class="frnd-request-list">
                                <li>
                                    <div class="frnd-request-member">
                                        <figure class="request-thumb">
                                            <a href="profile.html">
                                                <img src="assets/images/profile/profile-midle-1.jpg" alt="proflie author">
                                            </a>
                                        </figure>
                                        <div class="frnd-content">
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirm</button>
                                                <button class="frnd-btn delete">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="frnd-request-member">
                                        <figure class="request-thumb">
                                            <a href="profile.html">
                                                <img src="assets/images/profile/profile-midle-2.jpg" alt="proflie author">
                                            </a>
                                        </figure>
                                        <div class="frnd-content">
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirm</button>
                                                <button class="frnd-btn delete">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="frnd-request-member">
                                        <figure class="request-thumb">
                                            <a href="profile.html">
                                                <img src="assets/images/profile/profile-midle-3.jpg" alt="proflie author">
                                            </a>
                                        </figure>
                                        <div class="frnd-content">
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirm</button>
                                                <button class="frnd-btn delete">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                       
                        
                    </ul>
                </div>
                <div class="mobile-header-profile">
                    <!-- profile picture end -->
                    <div class="profile-thumb profile-setting-box">
                        
                            <a href="javascript:void(0)" class="profile-triger profile-ball-mobile">
                                        <i class="icofont-navigation-menu"></i>
                                    </a>
                        
                        <div class="profile-dropdown text-left">
                            <div class="profile-head">
                                            <h5 class="name"><?php echo $DadosAluno['nome']; ?></h5>
                                            <a class="mail" href="javascript:void(0)"><?php echo $DadosAluno['email_aluno']; ?></a>
                                        </div>
                                        <div class="profile-body">
                                            <ul >
                                                <li><a href="profile"><i class="icofont-user-alt-3"></i> Meus Dados</a></li>

                                            </ul>
                                            <ul >
                                                <li><a href="minhas-duvidas"><i class="icofont-question-circle"></i> Minhas Dúvidas</a></li>
                                                                                               
                                            </ul>

                                            <ul >
                                            <li><a href="https://efocco.wpensar.com.br/login" target="_blank">Financeiro</a></li>
                                        </ul >

                                            
                                           <ul>
                                                
                                                <li><a href="logout"><i class="icofont-logout"></i> Logout</a></li>
                                            </ul>
                                        </div>
                        </div>
                    </div>
                    <!-- profile picture end -->
                </div>
            </div>
        </div>
    </header>



