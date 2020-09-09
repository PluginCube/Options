<script>
	export let value;
	export let options;
</script>

<style lang="scss">
	ul {
		float: left;
		margin: -5px -10px -5px 0px;
		padding: 0;

		li {
			float: left;
			max-width: calc(25% - 10px);
			margin: 5px 10px 5px 0px;
			box-sizing: border-box;
			display: block;
			padding: 0;
			cursor: pointer;
			border-radius: 10px;

			img {
				float: left;
				max-width: 100%;
			}

			span {
				font-size: 10px;
				float: left;
				margin: 5px 0px;
				color: var(--cf-secondary-text);
			}

			&.selected img {
				float: left;
				box-sizing: border-box;
				outline: 3px solid #bcbec8;
			}
		}
	}
</style>

<ul>
	{#each options.items as item}
		<li class:selected={item.id === value} on:click={() => {value = item.id}}>
			<img src={item.img} alt={item.label ? item.label : 'No Caption'}>
			{#if item.label}
				<span>{item.label}</span>
			{/if}
		</li>
	{/each}	
</ul>
