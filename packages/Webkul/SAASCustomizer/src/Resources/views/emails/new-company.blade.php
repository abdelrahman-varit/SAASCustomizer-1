<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>BuyNoir</title>
		<style>
			/*All the styling goes here*/
			img {
			border: none;
			-ms-interpolation-mode: bicubic;
			max-width: 100%;
			display: block;
			}
			body {
			background-color: #ffffff;
			font-family: Arial, Helvetica, sans-serif;
			-webkit-font-smoothing: antialiased;
			font-size: 16px;
			line-height: 1.4;
			margin: 0;
			padding: 0;
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%; 
			}
			table {
			border-collapse: separate;
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			min-width: 100%;
			width: 100%; }
			table td {
			font-family: sans-serif;
			font-size: 16px;
			vertical-align: top; 
			}
			/* -------------------------------------
			BODY & CONTAINER
			------------------------------------- */
			.body {
			background-color: #ffffff;
			width: 100%; 
			}
			a {
			text-decoration: none;
			}
			/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
			.container {
			display: block;
			margin: 0 auto !important;
			/* makes it centered */
			max-width: 600px;
			width: 100%; 
			}
			/* This should also be a block element, so that it will fill 100% of the .container */
			.content {
			box-sizing: border-box;
			display: block;
			margin: 0 auto;
			max-width: 600px;
			padding: 0 30px; 
			}
			p {
			margin: 0;
			}
			/* -------------------------------------
			HEADER, FOOTER, MAIN
			------------------------------------- */
			.main {
			background: #fbd5d3;
			width: 100%; 
			}
			.wrapper {
			box-sizing: border-box;
			padding: 20px; 
			}
			.content-block {
			padding-bottom: 10px;
			padding-top: 10px;
			}
			.footer {
			clear: both;
			margin-top: 10px;
			margin-bottom: 30px;
			text-align: center;
			width: 100%; 
			}
			.footer td,
			.footer p,
			.footer span,
			.footer a {
			color: #000000;
			font-size: 12px;
			text-align: center; 
			}    
			.social-icons a {
				display: inline-block;
			}  
		</style>
	</head>
	<body class="">
		<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
			<tr>
				<td class="container">
					<div class="content">
						<table role="presentation" class="main">
							<tr>
								<td class="wrapper"></td>
							</tr>
						</table>
					</div>
					<div class="header">
						<table role="presentation" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td class="align-center">
									<a href="https://buynoir.com" target="_blank">
										<img src="{{ asset('/admin-themes/buynoir-admin/assets/admin/assets/images/email/email-banner.jpg') }}" alt="BuyNoir">
									</a>
								</td>
							</tr>
						</table>
					</div>
					<div class="content">
						<!-- START CENTERED WHITE CONTAINER -->
						<table role="presentation" class="main">
							<!-- START MAIN CONTENT AREA -->
							<tr>
								<td class="wrapper">
									<table role="presentation" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<p style="font-size: 32px; font-weight: bold;">Welcome to BuyNoir.</p>
												<br>
												<p style="font-size: 16px; font-weight: bold; color: #373737;">Congratulations on creating your online shop, powered by the world's only black owned eCommerce platform.</p>
												<br>
												<p style="color: #373737;">You can begin to customize your shop and add your products immediately.</p>
												<br>
												<p style="color: #373737;">You can access your shop's back office here:<br><a href="{{ $company->domain ?? '---' }}/admin/login" style="color: #aa5352;" target="_blank">{{ $company->domain ?? "---" }}/admin/login</a></p>
												<br>
												<p style="color: #373737;">You and your customers can acess your shop here:<br><a href="{{ $company->domain ?? '---' }}" style="color: #aa5352;" target="_blank">{{ $company->domain ?? "---" }}</a></p>
												<br>
												<br>
												<br>
												<p style="text-align: center; font-size: 14px; color: #977271;"><i>"Just don't give up what you're trying to do. Where there is love<br>and inspiration, I don't think you can go wrong."<br>- Ella Fitzgerald</i></p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<!-- END MAIN CONTENT AREA -->
						</table>
						<!-- START FOOTER -->
						<div class="footer">
							<table role="presentation" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										<p style="margin: 10px 0 5px 0;" class="social-icons">
											<a href="#" target="_blank"><img src="{{ asset('/admin-themes/buynoir-admin/assets/admin/assets/images/email/icon-fb.png') }}" alt="Facebook"></a>&nbsp;
											<a href="#" target="_blank"><img src="{{ asset('/admin-themes/buynoir-admin/assets/admin/assets/images/email/icon-twitter.png') }}" alt="Twitter"></a>&nbsp;
											<a href="#" target="_blank"><img src="{{ asset('/admin-themes/buynoir-admin/assets/admin/assets/images/email/icon-tumblr.png') }}" alt="Tumblr"></a>&nbsp;
											<a href="#" target="_blank"><img src="{{ asset('/admin-themes/buynoir-admin/assets/admin/assets/images/email/icon-instagram.png') }}" alt="Instagram"></a>
										</p>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<span class="apple-link">&copy;2021 BuyNoir</span>
										<br> Atlanta, GA 30087 | <a href="https://buynoir.com" target="_blank">buynoir.com</a>.<br>
									</td>
								</tr>
							</table>
						</div>
						<!-- END FOOTER -->
						<!-- END CENTERED WHITE CONTAINER -->
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>