
			
			</div>

			<input type="hidden" name="aviso-tipo-ava" value="<?php if(isset($_SESSION['aviso-tipo-ava'])){ echo $_SESSION['aviso-tipo-ava']; unset($_SESSION['aviso-tipo-ava']);} ?>">

			<input type="hidden" name="aviso-mensagem-ava" value="<?php if(isset($_SESSION['aviso-mensagem-ava'])){ echo $_SESSION['aviso-mensagem-ava']; unset($_SESSION['aviso-mensagem-ava']);} ?>">


			<?php include("include_js.php"); ?>


</body>
</html>