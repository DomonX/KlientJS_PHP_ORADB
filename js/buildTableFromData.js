function buildTableFromData(columns, data) {
	return ``
		.concat(`<table class="table">`)
		.concat(`<thead><tr>`)
		.concat(`${columns.map(p => `<th>${p}</th>`).join('')}`)
		.concat(`</tr></thead>`)
		.concat(`${data.map(e => `<tr>${e.map(o => `<td>${o}</td>`).join('')}</tr>`).join('')}`)
		.concat(`</tr>`)
		.concat(`</table>`);
}
