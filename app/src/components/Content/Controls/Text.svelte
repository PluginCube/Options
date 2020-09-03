<script>
	export let value;
	export let options;
	import Fxds from 'svelte-select';

</script>

<style>
	input {
		min-width: 230px;
		padding: 4px 12px;
		font-size: 13px;
		border: none;
		box-shadow: var(--cf-box-shadow);
		border-radius: var(--cf-border-radius);
	}
</style>

<input type='text' bind:value {...options}/>