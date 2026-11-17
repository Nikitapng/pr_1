import 'flowbite';
import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';

Alpine.plugin(mask);

window.Alpine = Alpine;

Alpine.start();

const selectElements = document.querySelectorAll('.status-form select');
for (let elem of selectElements) {
    elem.addEventListener('change', function () {
        this.form.submit();
    });
}
