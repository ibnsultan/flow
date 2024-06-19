<!doctype html>
<html lang="en">
	<!-- [Head] start -->
	<head>
		<title>Compact Layout | Able Pro Dashboard Template</title>
		<!-- [Meta] -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
		<meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
		<meta name="author" content="Phoenixcoded">
		<!-- [Favicon] icon -->
		<link rel="icon" href="/assets/images/favicon.svg" type="image/x-icon">
		<!-- [Font] Family -->
		<link rel="stylesheet" href="/assets/fonts/inter/inter.css" id="main-font-link">
		<!-- [phosphor Icons] https://phosphoricons.com/ -->
		<link rel="stylesheet" href="/assets/fonts/phosphor/duotone/style.css">
		<!-- [Tabler Icons] https://tablericons.com -->
		<link rel="stylesheet" href="/assets/fonts/tabler-icons.min.css">
		<!-- [Feather Icons] https://feathericons.com -->
		<link rel="stylesheet" href="/assets/fonts/feather.css">
		<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
		<link rel="stylesheet" href="/assets/fonts/fontawesome.css">
		<!-- [Material Icons] https://fonts.google.com/icons -->
		<link rel="stylesheet" href="/assets/fonts/material.css">
		<!-- [Template CSS Files] -->
		<link rel="stylesheet" href="/assets/css/style.css" id="main-style-link">
		<link rel="stylesheet" href="/assets/css/style-preset.css">
	</head>
	<!-- [Head] end --><!-- [Body] Start -->
	<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light" data-pc-direction="ltr">
		<!-- [ Pre-loader ] start -->
		<div class="page-loader">
			<div class="bar"></div>
		</div>
		<!-- [ Pre-loader ] End --><!-- [ Sidebar Menu ] start -->
		<nav class="pc-sidebar">
			<div class="navbar-wrapper">
				<div class="m-header">
					<a href="/dashboard/index.html" class="b-brand text-primary">
						<!-- ========   Change your logo from here   ============ --> <img src="/assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo"> <span class="badge bg-light-success rounded-pill ms-2 theme-version">v9.4.1</span>
					</a>
				</div>
				<div class="navbar-content">
					<div class="card pc-user-card">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0"><img src="/assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle"></div>
								<div class="flex-grow-1 ms-3 me-2">
									<h6 class="mb-0">Jonh Smith</h6>
									<small>Administrator</small>
								</div>
								<a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink">
									<svg class="pc-icon">
										<use xlink:href="#custom-sort-outline"></use>
									</svg>
								</a>
							</div>
							<div class="collapse pc-user-links" id="pc_sidebar_userlink">
								<div class="pt-3"><a href="#!"><i class="ti ti-user"></i> <span>My Account</span> </a><a href="#!"><i class="ti ti-settings"></i> <span>Settings</span> </a><a href="#!"><i class="ti ti-lock"></i> <span>Lock Screen</span> </a><a href="#!"><i class="ti ti-power"></i> <span>Logout</span></a></div>
							</div>
						</div>
					</div>
					<ul class="pc-navbar">
						<li class="pc-item pc-caption"><label>Navigation</label></li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-status-up"></use>
									</svg>
								</span>
								<span class="pc-mtext">Dashboard</span> <span class="pc-arrow"><i data-feather="chevron-right"></i></span> <span class="pc-badge">2</span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/dashboard/index.html">Default</a></li>
								<li class="pc-item"><a class="pc-link" href="/dashboard/analytics.html">Analytics</a></li>
								<li class="pc-item"><a class="pc-link" href="/dashboard/finance.html">Finance</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-document"></use>
									</svg>
								</span>
								<span class="pc-mtext">Layouts</span> <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/demo/layout-vertical.html">Vertical</a></li>
								<li class="pc-item"><a class="pc-link" href="/demo/layout-horizontal.html">Horizontal</a></li>
								<li class="pc-item"><a class="pc-link" href="/demo/layout-color-header.html">Layouts 2</a></li>
								<li class="pc-item"><a class="pc-link" href="/demo/layout-compact.html">Compact</a></li>
								<li class="pc-item"><a class="pc-link" href="/demo/layout-tab.html">Tab</a></li>
							</ul>
						</li>
						<li class="pc-item pc-caption">
							<label>Widget</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-presentation-chart"></use>
							</svg>
						</li>
						<li class="pc-item">
							<a href="/widget/w_statistics.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-story"></use>
									</svg>
								</span>
								<span class="pc-mtext">Statistics</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/widget/w_data.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-fatrows"></use>
									</svg>
								</span>
								<span class="pc-mtext">Data</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/widget/w_chart.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-presentation-chart"></use>
									</svg>
								</span>
								<span class="pc-mtext">Chart</span>
							</a>
						</li>
						<li class="pc-item pc-caption">
							<label>Admin Panel</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-layer"></use>
							</svg>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-layer"></use>
									</svg>
								</span>
								<span class="pc-mtext">Online Courses</span> <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/admins/course-dashboard.html">Dashboard</a></li>
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#!">Teacher<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/admins/course-teacher-list.html">List</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/course-teacher-apply.html">Apply</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/course-teacher-add.html">Add</a></li>
									</ul>
								</li>
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#!">Student<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/admins/course-student-list.html">list</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/course-student-apply.html">Apply</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/course-student-add.html">Add</a></li>
									</ul>
								</li>
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#!">Courses<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/admins/course-course-view.html">View</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/course-course-add.html">Add</a></li>
									</ul>
								</li>
								<li class="pc-item"><a class="pc-link" href="/admins/course-pricing.html">Pricing</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/course-site.html">Site</a></li>
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#!">Setting<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/admins/course-setting-payment.html">Payment</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/course-setting-pricing.html">Pricing</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/course-setting-notifications.html">Notifications</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-user"></use>
									</svg>
								</span>
								<span class="pc-mtext">Membership</span> <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/admins/membership-dashboard.html">Dashboard</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/membership-list.html">List</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/membership-pricing.html">Pricing</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/membership-setting.html">Setting</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-24-support"></use>
									</svg>
								</span>
								<span class="pc-mtext">Helpdesk</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/admins/helpdesk-dashboard.html">Dashboard</a></li>
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#!">Ticket<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/admins/helpdesk-create-ticket.html">Create</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/helpdesk-ticket.html">List</a></li>
										<li class="pc-item"><a class="pc-link" href="/admins/helpdesk-ticket-details.html">Details</a></li>
									</ul>
								</li>
								<li class="pc-item"><a class="pc-link" href="/admins/helpdesk-customer.html">Customer</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-bill"></use>
									</svg>
								</span>
								<span class="pc-mtext">Invoice</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/admins/invoice-dashboard.html">Dashboard</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/invoice-create.html">Create</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/invoice-view.html">Details</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/invoice-list.html">List</a></li>
								<li class="pc-item"><a class="pc-link" href="/admins/invoice-edit.html">Edit</a></li>
							</ul>
						</li>
						<li class="pc-item pc-caption">
							<label>UI Components</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-box-1"></use>
							</svg>
						</li>
						<li class="pc-item">
							<a href="/elements/bc_alert.html" class="pc-link" target="_blank">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-box-1"></use>
									</svg>
								</span>
								<span class="pc-mtext">Components</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/elements/animation.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-flag"></use>
									</svg>
								</span>
								<span class="pc-mtext">Animation</span>
							</a>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-mouse-circle"></use>
									</svg>
								</span>
								<span class="pc-mtext">Icons</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/elements/icon-feather.html">Feather</a></li>
								<li class="pc-item"><a class="pc-link" href="/elements/icon-fontawesome.html">Font Awesome 5</a></li>
								<li class="pc-item"><a class="pc-link" href="/elements/icon-material.html">Material</a></li>
								<li class="pc-item"><a class="pc-link" href="/elements/icon-tabler.html">Tabler</a></li>
								<li class="pc-item"><a class="pc-link" href="/elements/icon-phosphor.html">Phosphor</a></li>
								<li class="pc-item"><a class="pc-link" href="/elements/icon-custom.html">Custom</a></li>
							</ul>
						</li>
						<li class="pc-item pc-caption">
							<label>Forms</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-element-plus"></use>
							</svg>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-element-plus"></use>
									</svg>
								</span>
								<span class="pc-mtext">Forms Elements</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/forms/form_elements.html">Form Basic</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form_floating.html">Form Floating</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_basic.html">Form Options</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_input_group.html">Input Groups</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_checkbox.html">Checkbox</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_radio.html">Radio</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_switch.html">Switch</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_megaoption.html">Mega option</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-cpu-charge"></use>
									</svg>
								</span>
								<span class="pc-mtext">Forms Plugins</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#">Date<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/forms/form2_datepicker.html">Datepicker</a></li>
										<li class="pc-item"><a class="pc-link" href="/forms/form2_daterangepicker.html">Date Range Picker</a></li>
										<li class="pc-item"><a class="pc-link" href="/forms/form2_timepicker.html">Timepicker</a></li>
									</ul>
								</li>
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#">Select<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/forms/form2_choices.html">Choices js</a></li>
									</ul>
								</li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_rating.html">Rating</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_recaptcha.html">Google reCaptcha</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_inputmask.html">Input Masks</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_clipboard.html">Clipboard</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_nouislider.html">Nouislider</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_switchjs.html">Bootstrap Switch</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_typeahead.html">Typeahead</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-text-block"></use>
									</svg>
								</span>
								<span class="pc-mtext">Text Editors</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/forms/form2_tinymce.html">Tinymce</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_quill.html">Quill</a></li>
								<li class="pc-item pc-hasmenu">
									<a class="pc-link" href="#">CK editor<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/forms/editor-classic.html">classic</a></li>
										<li class="pc-item"><a class="pc-link" href="/forms/editor-document.html">Document</a></li>
										<li class="pc-item"><a class="pc-link" href="/forms/editor-inline.html">Inline</a></li>
										<li class="pc-item"><a class="pc-link" href="/forms/editor-balloon.html">Balloon</a></li>
									</ul>
								</li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_markdown.html">Markdown</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-row-vertical"></use>
									</svg>
								</span>
								<span class="pc-mtext">Form Layouts</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/forms/form2_lay-default.html">Layouts</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_lay-multicolumn.html">Multicolumn</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_lay-actionbars.html">Actionbars</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_lay-stickyactionbars.html">Sticky Action bars</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-document-upload"></use>
									</svg>
								</span>
								<span class="pc-mtext">File upload</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/forms/file-upload.html">Dropzone</a></li>
								<li class="pc-item"><a class="pc-link" href="/forms/form2_flu-uppy.html">Uppy</a></li>
							</ul>
						</li>
						<li class="pc-item">
							<a href="/forms/form2_wizard.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-password-check"></use>
									</svg>
								</span>
								<span class="pc-mtext">wizard</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/forms/form-validation.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-kanban"></use>
									</svg>
								</span>
								<span class="pc-mtext">Form Validation</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/forms/image_crop.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-crop"></use>
									</svg>
								</span>
								<span class="pc-mtext">Image cropper</span>
							</a>
						</li>
						<li class="pc-item pc-caption">
							<label>table</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-text-align-justify-center"></use>
							</svg>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-text-align-justify-center"></use>
									</svg>
								</span>
								<span class="pc-mtext">Bootstrap Table</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/table/tbl_bootstrap.html">Basic table</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_sizing.html">Sizing table</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_border.html">Border table</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_styling.html">Styling table</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-keyboard"></use>
									</svg>
								</span>
								<span class="pc-mtext">Vanilla Table</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-simple.html">Basic initialization</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-dynamic-import.html">Dynamic Import</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-render-column-cells.html">Render Column Cells</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-column-manipulation.html">Column Manipulation</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-datetime-sorting.html">Datetime Sorting</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-methods.html">Methods</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-add-rows.html">Add Rows</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-fetch-api.html">Fetch API</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-filters.html">Filters</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/tbl_dt-export.html">Export</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-graph"></use>
									</svg>
								</span>
								<span class="pc-mtext">Data table</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/table/dt_advance.html">Advance initialization</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_styling.html">Styling</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_api.html">API</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_plugin.html">Plug-in</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_sources.html">Data sources</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-add-item"></use>
									</svg>
								</span>
								<span class="pc-mtext">DT extensions</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_autofill.html">Autofill</a></li>
								<li class="pc-item pc-hasmenu">
									<a href="#!" class="pc-link">Button<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="/table/dt_ext_basic_buttons.html">Basic button</a></li>
										<li class="pc-item"><a class="pc-link" href="/table/dt_ext_export_buttons.html">Data export</a></li>
									</ul>
								</li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_col_reorder.html">Col reorder</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_fixed_columns.html">Fixed columns</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_fixed_header.html">Fixed header</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_key_table.html">Key table</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_responsive.html">Responsive</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_row_reorder.html">Row reorder</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_scroller.html">Scroller</a></li>
								<li class="pc-item"><a class="pc-link" href="/table/dt_ext_select.html">Select table</a></li>
							</ul>
						</li>
						<li class="pc-item pc-caption">
							<label>Charts &and; Maps</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-graph"></use>
							</svg>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-graph"></use>
									</svg>
								</span>
								<span class="pc-mtext">Charts</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/chart/chart-apex.html">Apex Chart</a></li>
								<li class="pc-item"><a class="pc-link" href="/chart/chart-peity.html">Peity Chart</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-shapes"></use>
									</svg>
								</span>
								<span class="pc-mtext">Maps</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/chart/map-vector.html">Vector Maps</a></li>
								<li class="pc-item"><a class="pc-link" href="/chart/map-gmap.html">Gmaps</a></li>
							</ul>
						</li>
						<li class="pc-item pc-caption">
							<label>Application</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-shopping-bag"></use>
							</svg>
						</li>
						<li class="pc-item">
							<a href="/application/calendar.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-calendar-1"></use>
									</svg>
								</span>
								<span class="pc-mtext">Calendar</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/application/chat.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-message-2"></use>
									</svg>
								</span>
								<span class="pc-mtext">Chat</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/application/cust_customer_list.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-notification-status"></use>
									</svg>
								</span>
								<span class="pc-mtext">Customer</span>
							</a>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-shopping-bag"></use>
									</svg>
								</span>
								<span class="pc-mtext">E-commerce</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/application/ecom_product.html">Product</a></li>
								<li class="pc-item"><a class="pc-link" href="/application/ecom_product-details.html">Product details</a></li>
								<li class="pc-item"><a class="pc-link" href="/application/ecom_product-list.html">Product List</a></li>
								<li class="pc-item"><a class="pc-link" href="/application/ecom_product-add.html">Add New Product</a></li>
								<li class="pc-item"><a class="pc-link" href="/application/ecom_checkout.html">Checkout</a></li>
							</ul>
						</li>
						<li class="pc-item">
							<a href="/application/file-manager.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-document-filter"></use>
									</svg>
								</span>
								<span class="pc-mtext">File manager</span>
							</a>
						</li>
						<li class="pc-item">
							<a href="/application/mail.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-direct-inbox"></use>
									</svg>
								</span>
								<span class="pc-mtext">Mail</span>
							</a>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-user-square"></use>
									</svg>
								</span>
								<span class="pc-mtext">Users</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/application/account-profile.html">Account Profile</a></li>
								<li class="pc-item"><a class="pc-link" href="/application/social-media.html">Social media</a></li>
							</ul>
						</li>
						<li class="pc-item pc-caption">
							<label>Pages</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-flag"></use>
							</svg>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-shield"></use>
									</svg>
								</span>
								<span class="pc-mtext">Authentication</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item pc-hasmenu">
									<a href="#!" class="pc-link">Authentication 1<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/login-v1.html">Login</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/register-v1.html">Register</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/forgot-password-v1.html">Forgot Password</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/check-mail-v1.html">check mail</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/reset-password-v1.html">reset password</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/code-verification-v1.html">code verification</a></li>
									</ul>
								</li>
								<li class="pc-item pc-hasmenu">
									<a href="#!" class="pc-link">Authentication 2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/login-v2.html">Login</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/register-v2.html">Register</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/forgot-password-v2.html">Forgot password</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/check-mail-v2.html">check mail</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/reset-password-v2.html">reset password</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/code-verification-v2.html">code verification</a></li>
									</ul>
								</li>
								<li class="pc-item"><a href="/pages/login-v3.html" target="_blank" class="pc-link">Authentication 3</a></li>
							</ul>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-flag"></use>
									</svg>
								</span>
								<span class="pc-mtext">Maintenance</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/error-404.html">Error 404</a></li>
								<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/error-500.html">Error 500</a></li>
								<li class="pc-item pc-hasmenu">
									<a href="#!" class="pc-link">Under construction<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/under-construction-v1.html">Under Construction 1</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/under-construction-v2.html">Under Construction 2</a></li>
									</ul>
								</li>
								<li class="pc-item pc-hasmenu">
									<a href="#!" class="pc-link">Coming soon<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/coming-soon-v1.html">Coming soon 1</a></li>
										<li class="pc-item"><a class="pc-link" target="_blank" href="/pages/coming-soon-v2.html">Coming soon 2</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="pc-item">
							<a href="/pages/contact-us.html" class="pc-link" target="_blank">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-24-support"></use>
									</svg>
								</span>
								<span class="pc-mtext">Contact us</span>
							</a>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-dollar-square"></use>
									</svg>
								</span>
								<span class="pc-mtext">Price</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="/pages/price-v1.html">Price 1</a></li>
								<li class="pc-item"><a class="pc-link" href="/pages/price-v2.html">Price 2</a></li>
							</ul>
						</li>
						<li class="pc-item">
							<a href="/pages/landing.html" class="pc-link" target="_blank">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-airplane"></use>
									</svg>
								</span>
								<span class="pc-mtext">Landing</span>
							</a>
						</li>
						<li class="pc-item pc-caption">
							<label>Other</label> 
							<svg class="pc-icon">
								<use xlink:href="#custom-notification-status"></use>
							</svg>
						</li>
						<li class="pc-item pc-hasmenu">
							<a href="#!" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-level"></use>
									</svg>
								</span>
								<span class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
							</a>
							<ul class="pc-submenu">
								<li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
								<li class="pc-item pc-hasmenu">
									<a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
										<li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
										<li class="pc-item pc-hasmenu">
											<a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
											<ul class="pc-submenu">
												<li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
												<li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="pc-item pc-hasmenu">
									<a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
									<ul class="pc-submenu">
										<li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
										<li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
										<li class="pc-item pc-hasmenu">
											<a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
											<ul class="pc-submenu">
												<li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
												<li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="pc-item">
							<a href="/other/sample-page.html" class="pc-link">
								<span class="pc-micon">
									<svg class="pc-icon">
										<use xlink:href="#custom-notification-status"></use>
									</svg>
								</span>
								<span class="pc-mtext">Sample page</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- [ Sidebar Menu ] end --><!-- [ Header Topbar ] start -->
		<header class="pc-header">
			<div class="header-wrapper">
				<!-- [Mobile Media Block] start -->
				<div class="me-auto pc-mob-drp">
					<ul class="list-unstyled">
						<!-- ======= Menu collapse Icon ===== -->
						<li class="pc-h-item pc-sidebar-collapse"><a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a></li>
						<li class="pc-h-item pc-sidebar-popup"><a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a></li>
						<li class="pc-h-item d-none d-md-inline-flex">
							<form class="form-search">
								<i class="search-icon">
									<svg class="pc-icon">
										<use xlink:href="#custom-search-normal-1"></use>
									</svg>
								</i>
								<input type="search" class="form-control" placeholder="Ctrl + K">
							</form>
						</li>
					</ul>
				</div>
				<!-- [Mobile Media Block end] -->
				<div class="ms-auto">
					<ul class="list-unstyled">
						<li class="dropdown pc-h-item">
							<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<svg class="pc-icon">
									<use xlink:href="#custom-sun-1"></use>
								</svg>
							</a>
							<div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
								<a href="#!" class="dropdown-item" onclick="layout_change('dark')">
									<svg class="pc-icon">
										<use xlink:href="#custom-moon"></use>
									</svg>
									<span>Dark</span> 
								</a>
								<a href="#!" class="dropdown-item" onclick="layout_change('light')">
									<svg class="pc-icon">
										<use xlink:href="#custom-sun-1"></use>
									</svg>
									<span>Light</span> 
								</a>
								<a href="#!" class="dropdown-item" onclick="layout_change_default()">
									<svg class="pc-icon">
										<use xlink:href="#custom-setting-2"></use>
									</svg>
									<span>Default</span>
								</a>
							</div>
						</li>
						<li class="dropdown pc-h-item">
							<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<svg class="pc-icon">
									<use xlink:href="#custom-setting-2"></use>
								</svg>
							</a>
							<div class="dropdown-menu dropdown-menu-end pc-h-dropdown"><a href="#!" class="dropdown-item"><i class="ti ti-user"></i> <span>My Account</span> </a><a href="#!" class="dropdown-item"><i class="ti ti-settings"></i> <span>Settings</span> </a><a href="#!" class="dropdown-item"><i class="ti ti-headset"></i> <span>Support</span> </a><a href="#!" class="dropdown-item"><i class="ti ti-lock"></i> <span>Lock Screen</span> </a><a href="#!" class="dropdown-item"><i class="ti ti-power"></i> <span>Logout</span></a></div>
						</li>
						<li class="pc-h-item">
							<a href="#" class="pc-head-link me-0" data-bs-toggle="offcanvas" data-bs-target="#announcement" aria-controls="announcement">
								<svg class="pc-icon">
									<use xlink:href="#custom-flash"></use>
								</svg>
							</a>
						</li>
						<li class="dropdown pc-h-item">
							<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<svg class="pc-icon">
									<use xlink:href="#custom-notification"></use>
								</svg>
								<span class="badge bg-success pc-h-badge">3</span>
							</a>
							<div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<h5 class="m-0">Notifications</h5>
									<a href="#!" class="btn btn-link btn-sm">Mark all read</a>
								</div>
								<div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
									<p class="text-span">Today</p>
									<div class="card mb-2">
										<div class="card-body">
											<div class="d-flex">
												<div class="flex-shrink-0">
													<svg class="pc-icon text-primary">
														<use xlink:href="#custom-layer"></use>
													</svg>
												</div>
												<div class="flex-grow-1 ms-3">
													<span class="float-end text-sm text-muted">2 min ago</span>
													<h5 class="text-body mb-2">UI/UX Design</h5>
													<p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card mb-2">
										<div class="card-body">
											<div class="d-flex">
												<div class="flex-shrink-0">
													<svg class="pc-icon text-primary">
														<use xlink:href="#custom-sms"></use>
													</svg>
												</div>
												<div class="flex-grow-1 ms-3">
													<span class="float-end text-sm text-muted">1 hour ago</span>
													<h5 class="text-body mb-2">Message</h5>
													<p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500.</p>
												</div>
											</div>
										</div>
									</div>
									<p class="text-span">Yesterday</p>
									<div class="card mb-2">
										<div class="card-body">
											<div class="d-flex">
												<div class="flex-shrink-0">
													<svg class="pc-icon text-primary">
														<use xlink:href="#custom-document-text"></use>
													</svg>
												</div>
												<div class="flex-grow-1 ms-3">
													<span class="float-end text-sm text-muted">2 hour ago</span>
													<h5 class="text-body mb-2">Forms</h5>
													<p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
												</div>
											</div>
										</div>
									</div>
									<div class="card mb-2">
										<div class="card-body">
											<div class="d-flex">
												<div class="flex-shrink-0">
													<svg class="pc-icon text-primary">
														<use xlink:href="#custom-user-bold"></use>
													</svg>
												</div>
												<div class="flex-grow-1 ms-3">
													<span class="float-end text-sm text-muted">12 hour ago</span>
													<h5 class="text-body mb-2">Challenge invitation</h5>
													<p class="mb-2"><span class="text-dark">Jonny aber</span> invites to join the challenge</p>
													<button class="btn btn-sm btn-outline-secondary me-2">Decline</button> <button class="btn btn-sm btn-primary">Accept</button>
												</div>
											</div>
										</div>
									</div>
									<div class="card mb-2">
										<div class="card-body">
											<div class="d-flex">
												<div class="flex-shrink-0">
													<svg class="pc-icon text-primary">
														<use xlink:href="#custom-security-safe"></use>
													</svg>
												</div>
												<div class="flex-grow-1 ms-3">
													<span class="float-end text-sm text-muted">5 hour ago</span>
													<h5 class="text-body mb-2">Security</h5>
													<p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-center py-2"><a href="#!" class="link-danger">Clear all Notifications</a></div>
							</div>
						</li>
						<li class="dropdown pc-h-item header-user-profile">
							<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false"><img src="/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"></a>
							<div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<h5 class="m-0">Profile</h5>
								</div>
								<div class="dropdown-body">
									<div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
										<div class="d-flex mb-1">
											<div class="flex-shrink-0"><img src="/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar wid-35"></div>
											<div class="flex-grow-1 ms-3">
												<h6 class="mb-1">Carson Darrin 🖖</h6>
												<span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3d5e5c4f4e525313595c4f4f54537d5e52504d5c5344135452">[email&#160;protected]</a></span>
											</div>
										</div>
										<hr class="border-secondary border-opacity-50">
										<div class="card">
											<div class="card-body py-3">
												<div class="d-flex align-items-center justify-content-between">
													<h5 class="mb-0 d-inline-flex align-items-center">
														<svg class="pc-icon text-muted me-2">
															<use xlink:href="#custom-notification-outline"></use>
														</svg>
														Notification
													</h5>
													<div class="form-check form-switch form-check-reverse m-0"><input class="form-check-input f-18" type="checkbox" role="switch"></div>
												</div>
											</div>
										</div>
										<p class="text-span">Manage</p>
										<a href="#" class="dropdown-item">
											<span>
												<svg class="pc-icon text-muted me-2">
													<use xlink:href="#custom-setting-outline"></use>
												</svg>
												<span>Settings</span> 
											</span>
										</a>
										<a href="#" class="dropdown-item">
											<span>
												<svg class="pc-icon text-muted me-2">
													<use xlink:href="#custom-share-bold"></use>
												</svg>
												<span>Share</span> 
											</span>
										</a>
										<a href="#" class="dropdown-item">
											<span>
												<svg class="pc-icon text-muted me-2">
													<use xlink:href="#custom-lock-outline"></use>
												</svg>
												<span>Change Password</span>
											</span>
										</a>
										<hr class="border-secondary border-opacity-50">
										<p class="text-span">Team</p>
										<a href="#" class="dropdown-item">
											<span>
												<svg class="pc-icon text-muted me-2">
													<use xlink:href="#custom-profile-2user-outline"></use>
												</svg>
												<span>UI Design team</span>
											</span>
											<div class="user-group">
												<img src="/assets/images/user/avatar-1.jpg" alt="user-image" class="avtar"> <span class="avtar bg-danger text-white">K</span> 
												<span class="avtar bg-success text-white">
													<svg class="pc-icon m-0">
														<use xlink:href="#custom-user"></use>
													</svg>
												</span>
												<span class="avtar bg-light-primary text-primary">+2</span>
											</div>
										</a>
										<a href="#" class="dropdown-item">
											<span>
												<svg class="pc-icon text-muted me-2">
													<use xlink:href="#custom-profile-2user-outline"></use>
												</svg>
												<span>Friends Groups</span>
											</span>
											<div class="user-group">
												<img src="/assets/images/user/avatar-1.jpg" alt="user-image" class="avtar"> <span class="avtar bg-danger text-white">K</span> 
												<span class="avtar bg-success text-white">
													<svg class="pc-icon m-0">
														<use xlink:href="#custom-user"></use>
													</svg>
												</span>
											</div>
										</a>
										<a href="#" class="dropdown-item">
											<span>
												<svg class="pc-icon text-muted me-2">
													<use xlink:href="#custom-add-outline"></use>
												</svg>
												<span>Add new</span>
											</span>
											<div class="user-group">
												<span class="avtar bg-primary text-white">
													<svg class="pc-icon m-0">
														<use xlink:href="#custom-add-outline"></use>
													</svg>
												</span>
											</div>
										</a>
										<hr class="border-secondary border-opacity-50">
										<div class="d-grid mb-3">
											<button class="btn btn-primary">
												<svg class="pc-icon me-2">
													<use xlink:href="#custom-logout-1-outline"></use>
												</svg>
												Logout
											</button>
										</div>
										<div class="card border-0 shadow-none drp-upgrade-card mb-0" style="background-image: url(/assets/images/layout/img-profile-card.jpg)">
											<div class="card-body">
												<div class="user-group"><img src="/assets/images/user/avatar-1.jpg" alt="user-image" class="avtar"> <img src="/assets/images/user/avatar-2.jpg" alt="user-image" class="avtar"> <img src="/assets/images/user/avatar-3.jpg" alt="user-image" class="avtar"> <img src="/assets/images/user/avatar-4.jpg" alt="user-image" class="avtar"> <img src="/assets/images/user/avatar-5.jpg" alt="user-image" class="avtar"> <span class="avtar bg-light-primary text-primary">+20</span></div>
												<h3 class="my-3 text-dark">245.3k <small class="text-muted">Followers</small></h3>
												<div class="btn btn btn-warning">
													<svg class="pc-icon me-2">
														<use xlink:href="#custom-logout-1-outline"></use>
													</svg>
													Upgrade to Business
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<div class="offcanvas pc-announcement-offcanvas offcanvas-end" tabindex="-1" id="announcement" aria-labelledby="announcementLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="announcementLabel">What's new announcement?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<p class="text-span">Today</p>
				<div class="card mb-3">
					<div class="card-body">
						<div class="align-items-center d-flex flex-wrap gap-2 mb-3">
							<div class="badge bg-light-success f-12">Big News</div>
							<p class="mb-0 text-muted">2 min ago</p>
							<span class="badge dot bg-warning"></span>
						</div>
						<h5 class="mb-3">Able Pro is Redesigned</h5>
						<p class="text-muted">Able Pro is completely renowed with high aesthetics User Interface.</p>
						<img src="/assets/images/layout/img-announcement-1.png" alt="img" class="img-fluid mb-3">
						<div class="row">
							<div class="col-12">
								<div class="d-grid"><a class="btn btn-outline-secondary" href="https://1.envato.market/zNkqj6" target="_blank">Check Now</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="align-items-center d-flex flex-wrap gap-2 mb-3">
							<div class="badge bg-light-warning f-12">Offer</div>
							<p class="mb-0 text-muted">2 hour ago</p>
							<span class="badge dot bg-warning"></span>
						</div>
						<h5 class="mb-3">Able Pro is in best offer price</h5>
						<p class="text-muted">Download Able Pro exclusive on themeforest with best price.</p>
						<a href="https://1.envato.market/zNkqj6" target="_blank"><img src="/assets/images/layout/img-announcement-2.png" alt="img" class="img-fluid"></a>
					</div>
				</div>
				<p class="text-span mt-4">Yesterday</p>
				<div class="card mb-3">
					<div class="card-body">
						<div class="align-items-center d-flex flex-wrap gap-2 mb-3">
							<div class="badge bg-light-primary f-12">Blog</div>
							<p class="mb-0 text-muted">12 hour ago</p>
							<span class="badge dot bg-warning"></span>
						</div>
						<h5 class="mb-3">Featured Dashboard Template</h5>
						<p class="text-muted">Do you know Able Pro is one of the featured dashboard template selected by Themeforest team.?</p>
						<img src="/assets/images/layout/img-announcement-3.png" alt="img" class="img-fluid">
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="align-items-center d-flex flex-wrap gap-2 mb-3">
							<div class="badge bg-light-primary f-12">Announcement</div>
							<p class="mb-0 text-muted">12 hour ago</p>
							<span class="badge dot bg-warning"></span>
						</div>
						<h5 class="mb-3">Buy Once - Get Free Updated lifetime</h5>
						<p class="text-muted">Get the lifetime free updates once you purchase the Able Pro.</p>
						<img src="/assets/images/layout/img-announcement-4.png" alt="img" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
		<!-- [ Header ] end --><!-- [ Main Content ] start -->
		<div class="pc-container">
			<div class="pc-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/dashboard/index.html">Home</a></li>
									<li class="breadcrumb-item"><a href="javascript: void(0)">Layout</a></li>
									<li class="breadcrumb-item" aria-current="page">Compact Layout</li>
								</ul>
							</div>
							<div class="col-md-12">
								<div class="page-header-title">
									<h2 class="mb-0">Compact Layout</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end --><!-- [ Main Content ] start -->
				<div class="row">
					<!-- [ sample-page ] start -->
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5>Hello card</h5>
							</div>
							<div class="card-body">
								<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
							</div>
						</div>
					</div>
					<!-- [ sample-page ] end -->
				</div>
				<!-- [ Main Content ] end -->
			</div>
		</div>
		<!-- [ Main Content ] end -->
		<footer class="pc-footer">
			<div class="footer-wrapper container-fluid">
				<div class="row">
					<div class="col my-1">
						<p class="m-0">Able Pro &#9829; crafted by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank">Phoenixcoded</a></p>
					</div>
					<div class="col-auto my-1">
						<ul class="list-inline footer-link mb-0">
							<li class="list-inline-item"><a href="/index.html">Home</a></li>
							<li class="list-inline-item"><a href="https://phoenixcoded.gitbook.io/able-pro/" target="_blank">Documentation</a></li>
							<li class="list-inline-item"><a href="https://phoenixcoded.authordesk.app/" target="_blank">Support</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!-- Required Js -->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="/assets/js/plugins/popper.min.js"></script>
        <script src="/assets/js/plugins/simplebar.min.js"></script>
        <script src="/assets/js/plugins/bootstrap.min.js"></script>
        <script src="/assets/js/fonts/custom-font.js"></script>
        <script src="/assets/js/pcoded.js"></script>
        <script src="/assets/js/plugins/feather.min.js"></script>
        <script>layout_change('light');</script>
        <script>change_box_container('false');</script>
        <script>layout_caption_change('true');</script>
        <script>layout_rtl_change('false');</script>
        <script>preset_change('preset-1');</script>
        <script>main_layout_change('vertical');</script>
		<div class="pct-c-btn"><a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout"><i class="ph-duotone ph-gear-six"></i></a></div>
		<div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title">Settings</h5>
				<button type="button" class="btn btn-icon btn-link-danger ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ti ti-x"></i></button>
			</div>
			<div class="pct-body customizer-body">
				<div class="offcanvas-body py-0">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="pc-dark">
								<h6 class="mb-1">Theme Mode</h6>
								<p class="text-muted text-sm">Choose light or dark mode or Auto</p>
								<div class="row theme-color theme-layout">
									<div class="col-4">
										<div class="d-grid">
											<button class="preset-btn btn active" data-value="true" onclick="layout_change('light');" data-bs-toggle="tooltip" title="Light">
												<svg class="pc-icon text-warning">
													<use xlink:href="#custom-sun-1"></use>
												</svg>
											</button>
										</div>
									</div>
									<div class="col-4">
										<div class="d-grid">
											<button class="preset-btn btn" data-value="false" onclick="layout_change('dark');" data-bs-toggle="tooltip" title="Dark">
												<svg class="pc-icon">
													<use xlink:href="#custom-moon"></use>
												</svg>
											</button>
										</div>
									</div>
									<div class="col-4">
										<div class="d-grid"><button class="preset-btn btn" data-value="default" onclick="layout_change_default();" data-bs-toggle="tooltip" title="Automatically sets the theme based on user's operating system's color scheme."><span class="pc-lay-icon d-flex align-items-center justify-content-center"><i class="ph-duotone ph-cpu"></i></span></button></div>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<h6 class="mb-1">Theme Contrast</h6>
							<p class="text-muted text-sm">Choose theme contrast</p>
							<div class="row theme-contrast">
								<div class="col-6">
									<div class="d-grid">
										<button class="preset-btn btn" data-value="true" onclick="layout_theme_contrast_change('true');" data-bs-toggle="tooltip" title="True">
											<svg class="pc-icon">
												<use xlink:href="#custom-mask"></use>
											</svg>
										</button>
									</div>
								</div>
								<div class="col-6">
									<div class="d-grid">
										<button class="preset-btn btn active" data-value="false" onclick="layout_theme_contrast_change('false');" data-bs-toggle="tooltip" title="False">
											<svg class="pc-icon">
												<use xlink:href="#custom-mask-1-outline"></use>
											</svg>
										</button>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<h6 class="mb-1">Custom Theme</h6>
							<p class="text-muted text-sm">Choose your primary theme color</p>
							<div class="theme-color preset-color"><a href="#!" data-bs-toggle="tooltip" title="Blue" class="active" data-value="preset-1"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Indigo" data-value="preset-2"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Purple" data-value="preset-3"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Pink" data-value="preset-4"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Red" data-value="preset-5"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Orange" data-value="preset-6"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Yellow" data-value="preset-7"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Green" data-value="preset-8"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Teal" data-value="preset-9"><i class="ti ti-checks"></i></a> <a href="#!" data-bs-toggle="tooltip" title="Cyan" data-value="preset-10"><i class="ti ti-checks"></i></a></div>
						</li>
						<li class="list-group-item">
							<h6 class="mb-1">Theme layout</h6>
							<p class="text-muted text-sm">Choose your layout</p>
							<div class="theme-main-layout d-flex align-center gap-1 w-100"><a href="#!" data-bs-toggle="tooltip" title="Vertical" class="active" data-value="vertical"><img src="/assets/images/customizer/caption-on.svg" alt="img" class="img-fluid"> </a><a href="#!" data-bs-toggle="tooltip" title="Horizontal" data-value="horizontal"><img src="/assets/images/customizer/horizontal.svg" alt="img" class="img-fluid"> </a><a href="#!" data-bs-toggle="tooltip" title="Color Header" data-value="color-header"><img src="/assets/images/customizer/color-header.svg" alt="img" class="img-fluid"> </a><a href="#!" data-bs-toggle="tooltip" title="Compact" data-value="compact"><img src="/assets/images/customizer/compact.svg" alt="img" class="img-fluid"> </a><a href="#!" data-bs-toggle="tooltip" title="Tab" data-value="tab"><img src="/assets/images/customizer/tab.svg" alt="img" class="img-fluid"></a></div>
						</li>
						<li class="list-group-item">
							<h6 class="mb-1">Sidebar Caption</h6>
							<p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
							<div class="row theme-color theme-nav-caption">
								<div class="col-6">
									<div class="d-grid"><button class="preset-btn btn-img btn active" data-value="true" onclick="layout_caption_change('true');" data-bs-toggle="tooltip" title="Caption Show"><img src="/assets/images/customizer/caption-on.svg" alt="img" class="img-fluid"></button></div>
								</div>
								<div class="col-6">
									<div class="d-grid"><button class="preset-btn btn-img btn" data-value="false" onclick="layout_caption_change('false');" data-bs-toggle="tooltip" title="Caption Hide"><img src="/assets/images/customizer/caption-off.svg" alt="img" class="img-fluid"></button></div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="pc-rtl">
								<h6 class="mb-1">Theme Layout</h6>
								<p class="text-muted text-sm">LTR/RTL</p>
								<div class="row theme-color theme-direction">
									<div class="col-6">
										<div class="d-grid"><button class="preset-btn btn-img btn active" data-value="false" onclick="layout_rtl_change('false');" data-bs-toggle="tooltip" title="LTR"><img src="/assets/images/customizer/ltr.svg" alt="img" class="img-fluid"></button></div>
									</div>
									<div class="col-6">
										<div class="d-grid"><button class="preset-btn btn-img btn" data-value="true" onclick="layout_rtl_change('true');" data-bs-toggle="tooltip" title="RTL"><img src="/assets/images/customizer/rtl.svg" alt="img" class="img-fluid"></button></div>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item pc-box-width">
							<div class="pc-container-width">
								<h6 class="mb-1">Layout Width</h6>
								<p class="text-muted text-sm">Choose Full or Container Layout</p>
								<div class="row theme-color theme-container">
									<div class="col-6">
										<div class="d-grid"><button class="preset-btn btn-img btn active" data-value="false" onclick="change_box_container('false')" data-bs-toggle="tooltip" title="Full Width"><img src="/assets/images/customizer/full.svg" alt="img" class="img-fluid"></button></div>
									</div>
									<div class="col-6">
										<div class="d-grid"><button class="preset-btn btn-img btn" data-value="true" onclick="change_box_container('true')" data-bs-toggle="tooltip" title="Fixed Width"><img src="/assets/images/customizer/fixed.svg" alt="img" class="img-fluid"></button></div>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="d-grid"><button class="btn btn-light-danger" id="layoutreset">Reset Layout</button></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<script>localStorage.setItem('layout', 'compact');</script>
        <script src="/assets/js/layout-compact.js"></script>
	</body>
	<!-- [Body] end -->
</html>