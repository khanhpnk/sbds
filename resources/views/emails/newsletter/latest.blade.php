@extends('emails.newsletter.layout')

@section('content')
	<tr>
		<td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
			<!-- BEGIN HEADER // -->
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #F4F4F4;border-top: 1px solid #FFFFFF;border-bottom: 1px solid #CCCCCC;border-collapse: collapse !important;">
				<tr>
					<td valign="top" class="headerContent" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #505050;font-family: Helvetica;font-size: 20px;font-weight: bold;line-height: 100%;padding-top: 0;padding-right: 0;padding-bottom: 0;padding-left: 0;text-align: left;vertical-align: middle;">
						<img src="http://gallery.mailchimp.com/2425ea8ad3/images/header_placeholder_600px.png" style="max-width: 600px;-ms-interpolation-mode: bicubic;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" id="headerImage" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext>
						<img src="{{-- $message->embed('image.jpg') --}}">
					</td>
				</tr>
			</table>
			<!-- // END HEADER -->
		</td>
	</tr>
	<tr>
		<td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
			<!-- BEGIN BODY // -->
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #F4F4F4;border-top: 1px solid #FFFFFF;border-bottom: 1px solid #CCCCCC;border-collapse: collapse !important;">
				<tr>
					<td valign="top" class="bodyContent" mc:edit="body_content00" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;padding-left: 20px;text-align: left;">
						<h1 style="display: block;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;color: #202020 !important;">Designing Your Template</h1>
						<h3 style="display: block;font-family: Helvetica;font-size: 16px;font-style: italic;font-weight: normal;line-height: 100%;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;color: #606060 !important;">Creating a good-looking email is simple</h3>
						Customize your template by clicking on the style editor tabs up above. Set your fonts, colors, and styles. After setting your styling is all done you can click here in this area, delete the text, and start adding your own awesome content.
					</td>
				</tr>
				<tr>
					<td class="bodyContent" style="padding-top: 20px;padding-bottom: 20px;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-right: 20px;padding-left: 20px;text-align: left;">
						<img src="http://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/body_placeholder_650px.png" style="max-width: 560px;-ms-interpolation-mode: bicubic;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;display: inline;" id="bodyImage" mc:label="body_image" mc:edit="body_image" mc:allowtext>
					</td>
				</tr>
				<tr>
					<td valign="top" class="bodyContent" mc:edit="body_content01" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;padding-left: 20px;text-align: left;">
						<h2 style="display: block;font-family: Helvetica;font-size: 20px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;color: #404040 !important;">Styling Your Content</h2>
						<h4 style="display: block;font-family: Helvetica;font-size: 14px;font-style: italic;font-weight: normal;line-height: 100%;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;color: #808080 !important;">Make your email easy to read</h4>
						After you enter your content, highlight the text you want to style and select the options you set in the style editor in the "<em>styles</em>" drop down box. Want to <a href="http://www.mailchimp.com/kb/article/im-using-the-style-designer-and-i-cant-get-my-formatting-to-change" target="_blank" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #EB4102;font-weight: normal;text-decoration: underline;">get rid of styling on a bit of text</a>, but having trouble doing it? Just use the "<em>remove formatting</em>" button to strip the text of any formatting and reset your style. 
					</td>
				</tr>
			</table>
			<!-- // END BODY -->
		</td>
	</tr>
@stop