@extends('layouts.mail')
@section('content')

	<!--span class="preheader">This is preheader text. Some clients will show this text as a preview.</span-->
	<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">
		<!-- START MAIN CONTENT AREA -->
		<tr>
			<td style="text-align:center; padding-top:1rem;"> 
				<img width="200" src="{{settings->logo_dark}}" alt="Logo">
			</td>
		</tr>
		<tr>
			<td class="wrapper">
				<p>Hi there</p>
				<p>Sometimes you just want to send a simple HTML email with a simple design and clear call to action. This is it.</p>
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
					<tbody>
						<tr style="text-align:center">
							<td> <a href="http://htmlemail.io" target="_blank">Call To Action</a> </td>
						</tr>
					</tbody>
				</table>
				<p>This is a really simple email template. It's sole purpose is to get the recipient to click the button with no distractions.</p>
				<p>Good luck! Hope it works.</p>
			</td>
		</tr>
		<!-- END MAIN CONTENT AREA -->
	</table>				

@endsection