import './jquery_fix'
import * as bootstrap from 'bootstrap';
import select2 from 'select2'
import Sortable from 'sortablejs';

window.Sortable = Sortable

select2();

import Spotlight from "spotlight.js/src/js/spotlight.js";
window.Spotlight = Spotlight

import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

document.addEventListener('livewire:init', () => {
	Livewire.on('close-modal', event => {
		console.log(`Closing modal id [${ event.data.modal_id }]`)
		$(`#${ event.data.modal_id }`).modal('hide')
	});

	Livewire.on('open-modal', event => {
		console.log(`Opening modal id [${ event.data.modal_id }]`)
		$(`#${ event.data.modal_id }`).modal('show')
	});
});

var toggleVisibility = function(toggler) {
	toggler = $(toggler)
	let input = toggler.parent().parent().find('.form-control')
	if (input.attr('type') === 'password') {
		input.attr('type', 'text')
	} else {
		input.attr('type', 'password')
	}
}

window.toggleVisibility = toggleVisibility
window.bootstrap = bootstrap