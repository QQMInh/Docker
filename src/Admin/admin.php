<?php
if (!defined('level')) {
	 echo'<script> alert("Bạn phải đăng nhập");</script>';
	 header('location: ?page_layout=trangchu');
}
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DN2ndHome</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/admin.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="app sidebar-mini">
	<header class="app-header"><a class="app-header__logo" href="#">DN2ndHome</a>
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      
      <ul class="app-nav">
      
      
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
        </li>
        
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">	
        	</a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">

            <li><a class="dropdown-item" href="index.php?page_layout=account"><i class="fa fa-user fa-lg"></i> Thông tin</a></li>
            <li><a class="dropdown-item" href="?page_layout=output"><i class="fa fa-sign-out fa-lg"></i>Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </header>
	
	 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
     <aside class="app-sidebar">
      <!-- <div class="app-sidebar__user">
         <div>
      
          
          	Xin chào, ADMIN
       
					</div>
        
      </div> -->

      <ul class="app-menu">
     	<?php if (defined("admin")) { ?>
     	<li class="active">
        	<a class="app-menu__item" href="index.php?page_layout=dashboard"><i class="app-menu__icon fa fa-dashboard"></i>
        	<span class="app-menu__label">Dashboard</span></a>
        </li>

		      <li>
        	  <a class="app-menu__item" href="index.php?page_layout=user"><i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Quản lý tài khoản</span></a>
         </li>	   
	       <li>
        	 <a class="app-menu__item" href="index.php?page_layout=acp_product"><i class="app-menu__icon fa fa-th-list"></i>
        	 <span class="app-menu__label">Tin đăng chưa duyệt</span></a>
        </li>
		<li>
        	 <a class="app-menu__item" href="index.php?page_layout=product"><i class="app-menu__icon fa fa-th-list"></i>
        	 <span class="app-menu__label">Tin đăng đã duyệt</span></a>
        </li>


         <li>
        	<a class="app-menu__item" href="index.php?page_layout=contact"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản lý contact</span></a>
        </li>

		    
       <li><a class="app-menu__item" href="?page_layout=output"><i class="fa fa-sign-out fa-lg"></i><span class="app-menu__label">Thoát</span></a></li>
       
		<?php } ?>
      </ul>
    </aside>


	<?php
	if (isset($_GET['page_layout'])) {
		switch ($_GET['page_layout']) {
			case 'product':
				include_once('Admin/Manage_Product/all_product.php');
				break;
			case 'add_product':
				include_once('Admin/Manage_Product/add_product.php');
				break;
			case 'edit_product':
				include_once('Admin/Manage_Product/edit_product.php');
				break;
			case 'del_product':
				include_once('Admin/Manage_Product/del_product.php');
				break;
			case 'acp_product':
				include_once('Admin/Manage_Product/accept_product.php');
				break;	
			case 'acp_controller':
				include_once('Admin/Manage_Product/acp_controller.php');
		

			case 'blog':
				include_once('admin/blog/all_blog.php');
				break;
			case 'add_blog':
				include_once('admin/blog/add_blog.php');
				break;
			case 'edit_blog':
				include_once('admin/blog/edit_blog.php');
				break;
			case 'del_blog':
				include_once('admin/blog/del_blog.php');
				break;

			case 'contact':
				include_once('Admin/Manage_Contact/all_contact.php');
				break;
			case 'del_contact':
				include_once('Admin/Manage_Contact/del_contact.php');
				break;

			case 'user':
				include_once('Admin/Manage_User/all_user.php');
				break;
			case 'add_user':
				include_once('Admin/Manage_User/add_user.php');
				break;
			case 'edit_user':
				include_once('Admin/Manage_User/edit_user.php');
				break;
			case 'del_user':
				include_once('Admin/Manage_User/del_user.php');
				break;
			case 'dashboard':
				include_once('Admin/dashboard.php');
				break;
			case "account":
				include_once("Admin/users/account.php");
				break;		
			case "output":
				include_once("Pages/logout.php");
				break;		
					
			
			
		}
	} else {
		include_once('admin/dashboard.php');
	}

	?>

    <script>  


    	       //menu kéo qua
					    (function () {
						"use strict";

						var treeviewMenu = $('.app-menu');

						// Toggle Sidebar
						$('[data-toggle="sidebar"]').click(function(event) {
							event.preventDefault();
							$('.app').toggleClass('sidenav-toggled');
						});

						// Activate sidebar treeview toggle
						$("[data-toggle='treeview']").click(function(event) {
							event.preventDefault();
							if(!$(this).parent().hasClass('is-expanded')) {
								treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
							}
							$(this).parent().toggleClass('is-expanded');
						});

						// Set initial active toggle
						$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

						//Activate bootstrip tooltips
						$("[data-toggle='tooltip']").tooltip();

					})();

  
            //show image khi chọn
            function showImages() {
                var fileSelected = document.getElementById('upload').files;
                if (fileSelected.length > 0) {
                    var fileToLoad = fileSelected[0];
                    var fileReader = new FileReader();
                    fileReader.onload = function(fileLoaderEvent) {
                        var srcData = fileLoaderEvent.target.result;
                        var newImage = document.createElement('img');
                        newImage.src = srcData;
                        document.getElementById('displayImg').innerHTML = newImage.outerHTML;
                
                    }
                    fileReader.readAsDataURL(fileToLoad);
                }
            }
   
    </script>

</body>

</html>