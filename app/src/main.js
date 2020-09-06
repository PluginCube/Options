import App from './components/App.svelte';

window.onload = () => {
	var app = new App({
		target: document.getElementById('cf')
	});
}