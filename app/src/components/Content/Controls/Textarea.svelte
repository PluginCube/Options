<script>
	export let value;
	export let options;
</script>

<style>
	textarea {
		min-width: 230px;
		padding: 4px 12px;
		font-size: 13px;
		border: none;
		box-shadow: 0px 0px 20px rgba(0,0,0, 0.05);
		border-radius: 5px;
	}
</style>

<textarea type='text' bind:value rows="6" cols="40" {...options}></textarea>