<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				 <!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="{{url('home')}}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
                                        @if(Auth::user()->role_id==1)
                                      <li class="">
						<a href="{{url('smsurl')}}">
							<i class="menu-icon fa fa-th"></i>
							<span class="menu-text">Settings</span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="{{url('companylist')}}">
							<i class="menu-icon fa fa-th"></i>
							<span class="menu-text"> Company List</span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="{{url('userlist')}}">
							<i class="menu-icon fa fa-envelope-o"></i>
							<span class="menu-text">User List</span>
						</a>
						<b class="arrow"></b>
					</li>
                                       <!-- <li class="active">
						<a href="http://sms.nestweaver.com/public/show-user">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Manage Users</span>
						</a>
						<b class="arrow"></b>
					</li>
                                       -->
                                        @elseif(Auth::user()->role_id==2)
                                        <li class="">
						<a href="{{url('contactlist')}}">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text">Contacts List</span>
						</a>
						<b class="arrow"></b>
					</li>
                                        <li class="">
						<a href="{{url('adminuserlist')}}">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text">User List</span>
						</a>
						<b class="arrow"></b>
					</li>
                                        <li class="">
						<a href="{{url('sendsms')}}">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text">Send Sms</span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="{{url('settings')}}">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">Settings</span>
						</a>
						<b class="arrow"></b>
					</li>
                                  <li class="">
					<a href = "#" class="">
						<i class="menu-icon fa fa-file-text"></i>
						<span class="menu-text">Reports</span>
						<b class = "caret"></b>
					</a>					
					<ul class="drop-menu">
						<li>
							<a href = "#">
								<i class="menu-icon fa fa-file-text"></i>
								<span class="menu-text">Overall SMS</span>
							</a>
						</li>
						<li>
							<a href = "#">
								<i class="menu-icon fa fa-file-text"></i>
								<span class="menu-text">User Wise SMS</span>
							</a>
						</li>
					</ul>					
				</li>
                                        @elseif(Auth::user()->role_id==3)
                                        <li class="">
						<a href="{{url('contactlist')}}">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text">Contacts List</span>
						</a>
						<b class="arrow"></b>
					</li>
                                        @endif
					
										
					
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
