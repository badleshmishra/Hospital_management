

	


<!DOCTYPE html>
<html>


<!-- Mirrored from www.konnectplugins.com/proclinic/Horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Oct 2024 16:14:18 GMT -->
<head>
	<?php $this->load->view('common/head');
	 ?>
</head>

<body>
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->
	<!-- Color Changer -->
	<!-- <div class="theme-settings" id="switcher">
		<span class="theme-click">
			<span class="ti-settings"></span>
		</span>
		<span class="theme-color theme-default theme-active" data-color="green"></span>
		<span class="theme-color theme-blue" data-color="blue"></span>
		<span class="theme-color theme-red" data-color="red"></span>
		<span class="theme-color theme-violet" data-color="violet"></span>
		<span class="theme-color theme-yellow" data-color="yellow"></span>
	</div> -->
	<!-- /Color Changer -->
	<div class="wrapper">		
		<!-- Page Content -->
		<div id="content">
			
			<?php 
	 $this->load->view('common/header');
	 $this->load->view($main_content);
	 $this->load->view('common/footer');
	 ?>
			
		</div>
		<!-- /Page Content -->
	</div>
	<!-- Back to Top -->
	<a id="back-to-top" href="#" class="back-to-top">
		<span class="ti-angle-up"></span>
	</a>
	<!-- /Back to Top -->
	
</body>


<!-- Mirrored from www.konnectplugins.com/proclinic/Horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Oct 2024 16:15:10 GMT -->
</html>
