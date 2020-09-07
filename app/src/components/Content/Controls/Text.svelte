<script>
	export let value;
	export let options;
</script>

<style>
	input {
		width: 260px;
		max-width: 100%;
		padding: 4px 12px;
		font-size: 13px;
		border: var(--cf-control-border) !important;
    	box-shadow: var(--cf-box-shadow) !important;
		border-radius: var(--cf-border-radius);
	}
</style>

<input type='text' bind:value {...options}/>