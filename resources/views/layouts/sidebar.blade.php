<div class="main-container" id="main-container">
		<script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>
		<div id="sidebar" class="sidebar responsive"  data-sidebar-hover="true" data-sidebar-scroll="true" data-sidebar="true" >
			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
			</script><!-- /.sidebar-shortcuts -->
			<ul class="nav nav-list">
				<li class="">
					<a href="http://localhost:8000/home">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard </span>
					</a>
					<b class="arrow"></b>
				</li>
				                                        @if(Auth::user()->role_id==1)

				<li class="">
						<a href="{{url('smsurl')}}">
							<i class="menu-icon fa fa-cogs" aria-hidden="true"></i>
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
<i class="menu-icon fa fa-users" aria-hidden="true"></i>
							<span class="menu-text">User List</span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="{{url('smsrequests')}}">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">SMS Requests</span>
						</a>
						<b class="arrow"></b>
					</li>
					<!--
					<li class="">
						<a href="{{url('adminreports')}}">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">SMS Reports</span>
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
						<a href="{{url('importcontacts')}}">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text">Import Contacts</span>
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
							<a href = "{{url('overallsms')}}">
								<i class="menu-icon fa fa-file-text"></i>
								<span class="menu-text">Overall SMS</span>
							</a>
						</li>
						<li>
							<a href = "{{url('userwisesms')}}">
								<i class="menu-icon fa fa-file-text"></i>
								<span class="menu-text">User Wise SMS</span>
							</a>
						</li>
</ul>											</li>

						<li class="">
						<a href="{{url('requestsms')}}">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text">Request Sms Credits</span>
						</a>
						
						<b class="arrow"></b>
					</li>
						
						
						                                        @elseif(Auth::user()->role_id==3)
<li class="">
						<a href="{{url('contactlists')}}">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text">Contacts List</span>
						</a>
						<b class="arrow"></b>
					</li>
                               <li class="">
						<a href="{{url('importcontact')}}">
<i class="menu-icon fa fa-upload" aria-hidden="true"></i>	
						<span class="menu-text">Import Contacts</span>
						</a>
						<b class="arrow"></b>
					</li>         @endif
					</ul>					
				</li>
			</ul><!-- /.nav-list -->
			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
			</script>
		</div>
