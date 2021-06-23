@extends('superlandpage_view::superlandpage.layouts.master')

@php
		$channel = company()->getCurrentChannel();
		
		if ( $channel ) {
				$homeSEO = $channel->home_seo;

				if (isset($homeSEO)) {
						$homeSEO = json_decode($channel->home_seo);

						 //$metaTitle = $homeSEO->meta_title;
						 $metaTitle = "BuyNoir - Cookies Policy";

						//$metaDescription = $homeSEO->meta_description;
						$metaDescription = "BuyNoir Cookies Policy, No coding required. Simply choose the template that matches your style, add your branding and products and start selling your stuff";

						//$metaKeywords = $homeSEO->meta_keywords;
						$metaKeywords = "BuyNoir Cookies Policy";
				}
		}
@endphp

@section('page_title')
		{{ isset($metaTitle) ? $metaTitle : "" }}
@endsection

@section('head')

		@if (isset($homeSEO))
				@isset($metaTitle)
						<meta name="title" content="{{ $metaTitle }}" />
				@endisset

				@isset($metaDescription)
						<meta name="description" content="{{ $metaDescription }}" />
				@endisset

				@isset($metaKeywords)
						<meta name="keywords" content="{{ $metaKeywords }}" />
				@endisset
		@endif
@endsection



@section('content-wrapper')

		{!! view_render_event('bagisto.saas.companies.home.content.before') !!}

		<div id="wrapper">
				<div id="content" id="buynoir-homepage">
					<!-- Stat main -->
					<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
				 
		
						<!-- Start integration__logo -->
						<section class="hidden mt-5 " id="Integrations">
							<div class="container mt-5">
								<div class="row justify-content-center ">
									<div class="mt-5 font-weight-normal col-md-12 col-lg-8 line-height-normal">
										<h2><strong>COOKIE POLICY</strong></h2>
										<p><strong>Last updated February 07, 2021</strong></p><br>
										<p>This Cookie Policy explains how BuyNoir LLC (<strong>"Company"</strong>, <strong>"we"</strong>, <strong>"us"</strong>, and <strong>"our"</strong>) uses cookies and similar technologies to recognize you when you visit our websites at <a href="http://buynoir.co">http://buynoir.co</a>, (<strong>"Websites"</strong>). It explains what these technologies are and why we use them, as well as your rights to control our use of them.</p>
										<p>In some cases we may use cookies to collect personal information, or that becomes personal information if we combine it with other information.</p><br>

										<h3><strong>What are cookies?</strong></h3>
										<p>Cookies are small data files that are placed on your computer or mobile device when you visit a website. Cookies are widely used by website owners in order to make their websites work, or to work more efficiently, as well as to provide reporting information.</p>
										<p>Cookies set by the website owner (in this case, BuyNoir LLC) are called "first party cookies". Cookies set by parties other than the website owner are called "third party cookies". Third party cookies enable third party features or functionality to be provided on or through the website (e.g. like advertising, interactive content and analytics). The parties that set these third party cookies can recognize your computer both when it visits the website in question and also when it visits certain other websites.</p><br>

										<h3><strong>Why do we use cookies?</strong></h3>
										<p>We use first and third party cookies for several reasons. Some cookies are required for technical reasons in order for our Websites to operate, and we refer to these as "essential" or "strictly necessary" cookies. Other cookies also enable us to track and target the interests of our users to enhance the experience on our Online Properties. Third parties serve cookies through our Websites for advertising, analytics and other purposes. This is described in more detail below.</p>
										<p>The specific types of first and third party cookies served through our Websites and the purposes they perform are described below (please note that the specific cookies served may vary depending on the specific Online Properties you visit):</p><br>
										
										<h3><strong>How can I control cookies?</strong></h3>

										<p>You have the right to decide whether to accept or reject cookies. You can exercise your cookie rights by setting your preferences in the Cookie Consent Manager. The Cookie Consent Manager allows you to select which categories of cookies you accept or reject. Essential cookies cannot be rejected as they are strictly necessary to provide you with services.</p>
										<p>The Cookie Consent Manager can be found in the notification banner and on our website. If you choose to reject cookies, you may still use our website though your access to some functionality and areas of our website may be restricted. You may also set or amend your web browser controls to accept or refuse cookies. As the means by which you can refuse cookies through your web browser controls vary from browser-to-browser, you should visit your browser's help menu for more information.</p>
										<p>In addition, most advertising networks offer you a way to opt out of targeted advertising. If you would like to find out more information, please visit <a href="http://www.aboutads.info/choices/" target="_blank">http://www.aboutads.info/choices/</a> or <a href="http://www.youronlinechoices.com" target="_blank">http://www.youronlinechoices.com</a>.</p>
										<p>The specific types of first and third party cookies served through our Websites and the purposes they perform are described in the table below (please note that the specific cookies served may vary depending on the specific Online Properties you visit):</p><br>

										<h3><strong>Essential website cookies:</strong></h3>
										<p>These cookies are strictly necessary to provide you with services available through our Websites and to use some of its features, such as access to secure areas.</p><br>
										<div class="mb-3 table-responsive">
											<table class="table table-sm">
												<tbody>
													<tr>
														<th width="150">Name</th>
														<td width="10">:</td>
														<td>__tlbcpv</td>
													</tr>
													<tr>
														<th width="150">Purpose</th>
														<td width="10">:</td>
														<td>Used to record unique visitor views of the consent banner.</td>
													</tr>
													<tr>
														<th width="150">Provider</th>
														<td width="10">:</td>
														<td><a href="termly.io">termly.io</a></td>
													</tr>
													<tr>
														<th width="150">Service</th>
														<td width="10">:</td>
														<td>Termly <a href="/privacy-policy">View Service Privacy Policy</a></td>
													</tr>
													<tr>
														<th width="150">Country</th>
														<td width="10">:</td>
														<td>United States</td>
													</tr>
													<tr>
														<th width="150">Type</th>
														<td width="10">:</td>
														<td>http_cookie</td>
													</tr>
													<tr>
														<th width="150">Expires in</th>
														<td width="10">:</td>
														<td>1 year</td>
													</tr>
												</tbody>
											</table>
										</div>
										

										<h3><strong>Performance and functionality cookies:</strong></h3>
										<p>These cookies are used to enhance the performance and functionality of our Websites but are non-essential to their use. However, without these cookies, certain functionality (like videos) may become unavailable.</p><br>

										<div class="mb-3 table-responsive">
											<table class="table table-sm">
												<tbody>
													<tr>
														<th width="150">Name</th>
														<td width="10">:</td>
														<td>XSRF-TOKEN</td>
													</tr>
													<tr>
														<th width="150">Purpose</th>
														<td width="10">:</td>
														<td>This cookie is written to help with site security in preventing Cross-Site Request Forgery attacks.</td>
													</tr>
													<tr>
														<th width="150">Provider</th>
														<td width="10">:</td>
														<td>buynoir.co</td>
													</tr>
													<tr>
														<th width="150">Service</th>
														<td width="10">:</td>
														<td>Advertiser's website domain <a href="/privacy-policy">View Service Privacy Policy</a></td>
													</tr>
													<tr>
														<th width="150">Country</th>
														<td width="10">:</td>
														<td>United States</td>
													</tr>
													<tr>
														<th width="150">Type</th>
														<td width="10">:</td>
														<td>http_cookie</td>
													</tr>
													<tr>
														<th width="150">Expires in</th>
														<td width="10">:</td>
														<td>2 hours</td>
													</tr>
												</tbody>
											</table>
										</div>

										<h3><strong>Unclassified cookies:</strong></h3>
										<p>These are cookies that have not yet been categorized. We are in the process of classifying these cookies with the help of their providers.</p><br>
										<div class="mb-3 table-responsive">
											<table class="table table-sm">
												<tbody>
													<tr>
														<th width="150">Name</th>
														<td width="10">:</td>
														<td>phpdebugbar-height</td>
													</tr>
													<tr>
														<th width="150">Purpose</th>
														<td width="10">:</td>
														<td>__________</td>
													</tr>
													<tr>
														<th width="150">Provider</th>
														<td width="10">:</td>
														<td>buynoir.co</td>
													</tr>
													<tr>
														<th width="150">Service</th>
														<td width="10">:</td>
														<td>__________</td>
													</tr>
													<tr>
														<th width="150">Country</th>
														<td width="10">:</td>
														<td>United States</td>
													</tr>
													<tr>
														<th width="150">Type</th>
														<td width="10">:</td>
														<td>html_local_storage</td>
													</tr>
													<tr>
														<th width="150">Expires in</th>
														<td width="10">:</td>
														<td>persistent</td>
													</tr>
												</tbody>
											</table>
										</div>

										<div class="mb-3 table-responsive">
											<table class="table table-sm">
												<tbody>
													<tr>
														<th width="150">Name</th>
														<td width="10">:</td>
														<td>buynoir_session</td>
													</tr>
													<tr>
														<th width="150">Purpose</th>
														<td width="10">:</td>
														<td>__________</td>
													</tr>
													<tr>
														<th width="150">Provider</th>
														<td width="10">:</td>
														<td>buynoir.co</td>
													</tr>
													<tr>
														<th width="150">Service</th>
														<td width="10">:</td>
														<td>__________</td>
													</tr>
													<tr>
														<th width="150">Country</th>
														<td width="10">:</td>
														<td>United States</td>
													</tr>
													<tr>
														<th width="150">Type</th>
														<td width="10">:</td>
														<td>server_cookie</td>
													</tr>
													<tr>
														<th width="150">Expires in</th>
														<td width="10">:</td>
														<td>session</td>
													</tr>
												</tbody>
											</table>
										</div>

										<h3><strong>What about other tracking technologies, like web beacons?</strong></h3>
										<p>Cookies are not the only way to recognize or track visitors to a website. We may use other, similar technologies from time to time, like web beacons (sometimes called "tracking pixels" or "clear gifs"). These are tiny graphics files that contain a unique identifier that enable us to recognize when someone has visited our Websites or opened an e-mail including them. This allows us, for example, to monitor the traffic patterns of users from one page within a website to another, to deliver or communicate with cookies, to understand whether you have come to the website from an online advertisement displayed on a third-party website, to improve site performance, and to measure the success of e-mail marketing campaigns. In many instances, these technologies are reliant on cookies to function properly, and so declining cookies will impair their functioning.</p><br>

										<h3><strong>Do you use Flash cookies or Local Shared Objects?</strong></h3>
										<p>Websites may also use so-called "Flash Cookies" (also known as Local Shared Objects or "LSOs") to, among other things, collect and store information about your use of our services, fraud prevention and for other site operations.</p>
										<p>If you do not want Flash Cookies stored on your computer, you can adjust the settings of your Flash player to block Flash Cookies storage using the tools contained in the <a href="http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager07.html" target="_blank">Website Storage Settings Panel</a>. You can also control Flash Cookies by going to the <a href="http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager03.html" target="_blank">Global Storage Settings Panel</a> and following the instructions (which may include instructions that explain, for example, how to delete existing Flash Cookies (referred to "information" on the Macromedia site), how to prevent Flash LSOs from being placed on your computer without your being asked, and (for Flash Player 8 and later) how to block Flash Cookies that are not being delivered by the operator of the page you are on at the time).</p>
										<p>Please note that setting the Flash Player to restrict or limit acceptance of Flash Cookies may reduce or impede the functionality of some Flash applications, including, potentially, Flash applications used in connection with our services or online content.</p><br>

										<h3><strong>Do you serve targeted advertising?</strong></h3>
										<p>Third parties may serve cookies on your computer or mobile device to serve advertising through our Websites. These companies may use information about your visits to this and other websites in order to provide relevant advertisements about goods and services that you may be interested in. They may also employ technology that is used to measure the effectiveness of advertisements. This can be accomplished by them using cookies or web beacons to collect information about your visits to this and other sites in order to provide relevant advertisements about goods and services of potential interest to you. The information collected through this process does not enable us or them to identify your name, contact details or other details that directly identify you unless you choose to provide these.</p><br>

										<h3><strong>How often will you update this Cookie Policy?</strong></h3>
										<p>We may update this Cookie Policy from time to time in order to reflect, for example, changes to the cookies we use or for other operational, legal or regulatory reasons. Please therefore re-visit this Cookie Policy regularly to stay informed about our use of cookies and related technologies.</p>
										<p>The date at the top of this Cookie Policy indicates when it was last updated.</p><br>

										<h3><strong>Where can I get further information?</strong></h3>
										<p>If you have any questions about our use of cookies or other technologies, please email us at daniel@buynoir.co or by post to:</p><br>
										<address>
											<strong>BuyNoir LLC</strong><br>
											6085 Bowers Road<br>
											Stone Mountain, GA 30087<br>
											United States<br>
											Phone: (+1)9173644932
										</address>
									</div>
								</div>
								
							</div>
						</section>
						<!-- End. integration__logo -->
		
 
		 
				 
					</main>
				</div>
				<!-- [id] content -->
		
		 
			</div>
			<!-- End. wrapper -->
		

		{{ view_render_event('bagisto.saas.companies.home.content.after') }}

	
		
@endsection

 
@section('css')
	<style>
		.table::before {
			content: none;
		}
		.line-height-normal {
			line-height: 1.5;
		}
	</style>
@endsection

