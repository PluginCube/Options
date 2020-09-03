<script>
	export let value;
	export let options;
</script>

<style>
	textarea {
		min-width: 230px;
		padding: 6px 12px;
		font-size: 13px;
		border: none;
		box-shadow: var(--cf-box-shadow);
		border-radius: var(--cf-border-radius);
	}
</style>

<textarea type='text' bind:value rows="6" cols="40" {...options}></textarea>