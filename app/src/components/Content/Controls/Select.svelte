<script>
    export let value
    export let options
</script>

<style>
    select {
        min-width: 150px;
        padding: 4px 12px;
        font-size: 13px;
        border: var(--cf-control-border);
        box-shadow: var(--cf-box-shadow);
        border-radius: var(--cf-border-radius);
        background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: calc(100% - 10px);
        margin: 0;
    }
</style>

<select bind:value={value}>
    {#each options.choices as choice}
        <option value={choice.id}>
            {choice.title}
        </option>
    {/each}
</select>
