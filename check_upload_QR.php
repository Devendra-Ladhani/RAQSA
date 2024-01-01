<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QR Code Scanner</title>
	<script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script>
</head>
<body>
	<div id="reader"></div>
	<input type="file" id="qr-input-file" accept="image/*">
	<!-- 
  		Or add captured if you only want to enable smartphone camera, PC browsers will ignore it.
	-->
	<input type="file" id="qr-input-file" accept="image/*" capture>
	<script type="text/javascript">
		const html5QrCode = new Html5Qrcode(/* element id */ "reader");

// File based scanning
		const fileinput = document.getElementById('qr-input-file');
		fileinput.addEventListener('change', e => {
  		if (e.target.files.length == 0) {
    		// No file selected, ignore 
    		return;
  		}

  // Use the first item in the list
  		const imageFile = e.target.files[0];
  		html5QrCode.scanFile(imageFile, /* showImage= */true)
  		.then(qrCodeMessage => {
    // success, use qrCodeMessage
    		console.log(qrCodeMessage);
  		})
  		.catch(err => {
    // failure, handle it.
    		console.log(`Error scanning file. Reason: ${err}`)
  		});
		});
	</script>
</body>
</html>