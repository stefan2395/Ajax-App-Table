	// ===========>  Search table --> FROM w3s site <===========
	function Search() {
		const input = document.getElementById('mySearch')
		const filter = input.value.toLowerCase()
		const table = document.getElementById('search')
		const tr = [...table.getElementsByTagName('tr')]

		tr.forEach((t) => {
			const foundMatch = [...t.getElementsByTagName('td')].some((td) => {
		  	return td.innerHTML.toLowerCase().indexOf(filter) > -1
		})
			if (foundMatch) {
			  	t.style.display = ''
			} else {
			  	t.style.display = 'none'
			}
		})
	}
	// ===========>  Search table --> FROM w3s site <===========