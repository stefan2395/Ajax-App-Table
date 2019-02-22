	// ===========> Check if new password same as repeat password value <===========
	function check() {
		var changepass = document.getElementById('changepass').value;
		var repeatpass = document.getElementById('repeatpass').value;
		var message    = document.getElementById('message');

		if (changepass == repeatpass) {
			message.style.color = 'green';
			message.innerHTML = 'matching';
			document.getElementById('no-match-pass').innerHTML = '';
		} else {
			message.style.color = 'red';
			message.innerHTML = 'not matching';
		}

		if (changepass == '' || repeatpass == '') {
			message.innerHTML = '';
		}
	}
	// ===========> END: Check if new password same as repeat password value <===========