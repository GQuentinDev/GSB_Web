			</div>
			<!-- /.row -->

		</div>
		<!-- /.container -->

		<footer class="footer bg-secondary p-2" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-10">
						Copyright &copy; OLLIVIER Alan & GUILLEMIN Quentin 2018-<?php echo date("Y"); ?>

					</div>
					<div class="col-1">
						<a href="#Top" class="mouv"><img src="images/arrow_up.png" width="30px"></a>
					</div>
				</div>
			</div>
		</footer>

		<!-- JavaScript -->
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.js" type="text/javascript"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

		<!-- Custom JavaScript -->
		<script src="vendor/js/smooth_scroll.js" type="text/javascript"></script>
		<script src="vendor/js/myJS.js" type="text/javascript"></script>
		<?php
		if (!empty($modif) && $modif == true)
		{
			?>

			<script>modifier();</script>
			<?php
		}
		?>

</body>

</html>