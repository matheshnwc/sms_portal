@include('layouts.header')
@include('layouts.sidebar')
<div class="main-content">
<script src="{!! URL('/js/conversionfunctions.js')!!}" type="text/javascript">//</script>
<script src="{!! URL('/js/entities.js')!!}" type="text/javascript">//</script>
			<script type="text/javascript">
			function countChar(val){
				 var len = val.value.length;
				 if (len > 160) {
						  val.value = val.value.substring(0, 160);
				 } else {
						  $('#charNum').text(160 - len);
				 }
				 displayResults(convertAllEscapes(val.value,0));
				  
			};

			function displayResults(str, src) {
				// convert the string of characters into various formats and send to UI
				// str: string, the string of characters
				// src: string, the id of the UI location that originated the request
				var preserve = 'none';
				var pad = true;
				var showinvisibles;
				var bidimarkup;
				var cstyle = false;
			 
			 
			  
					preserve = 'none';
					preserve = 'ascii';   
					 $('#unicode_text').val( convertCharStr2SelectiveCPs( str, preserve, true, '&#x', ';', 'hex' ));
					 
			  
					 
				}
			function convertAllEscapes (str, numbers) {
			 

				str = convertHexNCR2Char(str);  
				//str = convertDecNCR2Char(str); 
			 
				
				return str;
				}
				function convertHexNCR2Char ( str ) { 
				// converts a string containing &#x...; escapes to a string of characters
				// str: string, the input
				
				// convert up to 6 digit escapes to characters
				str = str.replace(/&#x([A-Fa-f0-9]{1,6});/g, 
								function(matchstr, parens) {
									return hex2char(parens);
									}
									); 
				return str;
				}

			function convertDecNCR2Char ( str ) { 
				// converts a string containing &#...; escapes to a string of characters
				// str: string, the input
				
				// convert up to 6 digit escapes to characters
				str = str.replace(/&#([0-9]{1,7});/g, 
								function(matchstr, parens) {
									return dec2char(parens);
									}
									);
				return str;
				}


				
			function convertCharStr2SelectiveCPs ( str, preserve, pad, before, after, base ) { 
				// converts a string of characters to code points or code point based escapes
				// str: string, the string to convert
				// preserve: string enum [ascii, latin1], a set of characters to not convert
				// pad: boolean, if true, hex numbers lower than 1000 are padded with zeros
				// before: string, any characters to include before a code point (eg. &#x for NCRs)
				// after: string, any characters to include after (eg. ; for NCRs)
				// base: string enum [hex, dec], hex or decimal output
				var haut = 0; 
				var n = 0; var cp;
				var CPstring = '';
				for (var i = 0; i < str.length; i++) {
					var b = str.charCodeAt(i); 
					if (b < 0 || b > 0xFFFF) {
						CPstring += 'Error in convertCharStr2SelectiveCPs: byte out of range ' + dec2hex(b) + '!';
						}
					if (haut != 0) {
						if (0xDC00 <= b && b <= 0xDFFF) {
							if (base == 'hex') {
								CPstring += before + dec2hex(0x10000 + ((haut - 0xD800) << 10) + (b - 0xDC00)) + after;
								}
							else { cp = 0x10000 + ((haut - 0xD800) << 10) + (b - 0xDC00);
								CPstring += before + cp + after; 
								}
							haut = 0;
							continue;
							}
						else {
							CPstring += 'Error in convertCharStr2SelectiveCPs: surrogate out of range ' + dec2hex(haut) + '!';
							haut = 0;
							}
						}
					if (0xD800 <= b && b <= 0xDBFF) {
						haut = b;
						}
					else {
						if (preserve == 'ascii'&& b <= 127) { //  && b != 0x3E && b != 0x3C &&  b != 0x26) {
							CPstring += str.charAt(i);
							}
						else if (b <= 255 && preserve == 'latin1') { // && b != 0x3E && b != 0x3C &&  b != 0x26) {
							CPstring += str.charAt(i);
							}
						else { 
							if (base == 'hex') {
								cp = dec2hex(b); 
								if (pad) { while (cp.length < 4) { cp = '0'+cp; } }
								}
							else { cp = b; }
							CPstring += before + cp + after; 
							}
						}
					}
				return CPstring;
				}
			</script>
			<div class="main-content-inner">
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="http://sms.nestweaver.com/public/home">Home</a>
						</li>
						<li class="active">Send SMS</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<div class="page-content">
					<div class="page-header">
						<h1>Send SMS</h1>
					</div>
					<div class="flash-message">
					@include('layouts.message')
					</div>
					<div class="row">
						<div class="col-xs-12">
							<form class="form-horizontal" role="form" action="http://localhost:8000/postsms" method="post">
								<input name="_token" value="jmDZzZ1y9oGlRuo12sZK87pT1s4bSQbhbyhcQrZd" type="hidden">
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtmobilenumber">Recipients (Mobile Numbers) </label>
										<div class="col-sm-9">	
				<input type="text" id="txtmobilenumber" name='txtmobilenumber' placeholder="Mobile Number" class="col-xs-10 col-sm-5" value='{{$mobilenumbers}}'>
										<span>{!!$errors->first('txtmobilenumber')!!}</span>
				&nbsp;&nbsp; <a href="{{url('addrecipient')}}">Add Recipient</a>
									</div>
								</div>								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtMessage"> Message </label>

									<div class="col-sm-9">
									<div>Char. Count:<span id="charNum">160</span></div>
										<textarea onkeyup="countChar(this)" type="text" id="txtMessage" name="txtMessage" placeholder="Message" value="" class="col-xs-10 col-sm-5"></textarea>

										<span></span>
									</div>
								</div>						 
								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
											Send 
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="ace-icon fa fa-undo bigger-110"></i>
											Reset
										</button>
									</div>
								</div>
								<input name="unicode_text" id="unicode_text" value="" type="hidden">
								<input name="id" value="" type="hidden">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('layouts.footer')
